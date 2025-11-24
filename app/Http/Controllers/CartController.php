<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('customer.cart', compact('cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        $id = $request->menu_id;
        $menu = Menu::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $menu->menu_name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image_url
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()
            ->with('success', 'Menu berhasil ditambahkan ke keranjang!')
            ->with('type', 'cart');
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'id' => 'required|integer'
        ]);

        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart); 

            return redirect()->route('cart.index');
        }

        return redirect()->route('cart.index');
    }

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