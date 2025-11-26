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
    public function store(Request $request)
    {
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong!');
        }

        $totalAmount = 0;
        foreach($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $orderType = $request->order_type;

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'order_type' => $orderType,
                'order_time' => Carbon::now(),
            ]);

            foreach($cart as $menu_id => $details) {
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'menu_id' => $menu_id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            session()->forget('cart');

            DB::commit(); 

            return redirect()->route('home')
                ->with('success', 'Pesanan Anda berhasil dibuat! Silakan tunggu pesanan Anda.');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}