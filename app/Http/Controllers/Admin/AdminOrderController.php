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

        $filter = function ($status) use ($search) {
            return Order::with('user')
                ->where('status', $status)
                ->when($search, function ($q) use ($search) {
                    $q->whereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%");
                    });
                })
                ->get();
        };

        return view('admin.orders.index', [
            'pendingOrders'   => $filter(Order::STATUS_PENDING),
            'completedOrders' => $filter(Order::STATUS_COMPLETED),
            'canceledOrders'  => $filter(Order::STATUS_CANCELED),
        ]);
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
