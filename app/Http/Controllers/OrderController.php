<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function store()
    {
        // 1. Cek apakah keranjang ada isinya?
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong!');
        }

        // 2. Hitung Total Bayar
        $totalAmount = 0;
        foreach($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Gunakan DB Transaction agar data aman
        try {
            DB::beginTransaction();

            // 3. Simpan ke Tabel ORDERS
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'order_type' => 'dine_in',
                'order_time' => Carbon::now(),
            ]);

            // 4. Simpan ke Tabel ORDER_DETAILS
            foreach($cart as $menu_id => $details) {
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'menu_id' => $menu_id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            // 5. Hapus Isi Keranjang (Wajib)
            session()->forget('cart');

            // 6. Simpan Permanen ke Database
            DB::commit(); 

            // 7. REDIRECT MENGGUNAKAN PARAMETER URL (JALUR PINTAS)
            // Ini akan menghasilkan URL: http://localhost:8000/?checkout_status=success
            return redirect()->route('home', ['checkout_status' => 'success']);

        } catch (\Exception $e) {
            DB::rollback(); // Batalkan jika ada error
            dd($e->getMessage());
        }
    }
}