<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Order::with('user')
            ->where('status', 'pending');

        // Filter pencarian
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $orders = $query->get();

        return view('admin.orders.index', compact('orders'));
    }


    public function approve($id)
    {

        $order = Order::findOrFail($id);
        $order->status = Order::STATUS_COMPLETED;
        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order approved successfully.');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = Order::STATUS_CANCELED;
        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order canceled successfully.');
    }
}
