<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Panggil Model Menu

class CartController extends Controller
{
    // 1. MENAMPILKAN HALAMAN KERANJANG
    public function index()
    {
        // Ambil data cart dari session (jika kosong, ambil array kosong)
        $cart = session()->get('cart', []);

        // Hitung Total Harga
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('customer.cart', compact('cart', 'total'));
    }

    // 2. MENAMBAH ITEM KE KERANJANG
    public function addToCart(Request $request)
    {
        $id = $request->menu_id;
        $menu = Menu::findOrFail($id); // Cari menu di database

        $cart = session()->get('cart', []);

        // Cek: Jika menu sudah ada di cart, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, masukkan sebagai item baru
            $cart[$id] = [
                "name" => $menu->menu_name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image_url
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return redirect()->back()
            ->with('success', 'Menu berhasil ditambahkan ke keranjang!')
            ->with('type', 'cart');
    }

    // METHOD BARU: MEMPERBARUI JUMLAH ITEM
    public function updateQuantity(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'id' => 'required|integer'
        ]);

        $cart = session()->get('cart');

        // 2. Cek apakah item ada di session
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart); // Simpan kembali ke session

            // Redirect ke cart (tanpa pesan sukses agar tidak ada pop-up setiap ganti angka)
            return redirect()->route('cart.index');
        }

        // Jika item tidak ditemukan, kembali
        return redirect()->route('cart.index');
    }

    // 3. MENGHAPUS ITEM DARI KERANJANG
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Menu dihapus dari keranjang');
        }
    }
}