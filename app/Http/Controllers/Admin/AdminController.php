<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalMenu = Menu::count();

        $totalOrderHariIni = Order::whereDate('created_at', now())->count();
        $totalReservasiHariIni = Reservation::whereDate('created_at', now())->count();

        $pendapatanOrder = [
            'dine_in' => [
                'today' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'dine_in')
                    ->whereDate('created_at', today())
                    ->sum('total_amount'),
                'thisWeek' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'dine_in')
                    ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->sum('total_amount'),
                'thisMonth' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'dine_in')
                    ->whereMonth('created_at', now()->month)
                    ->sum('total_amount'),
                'allTime' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'dine_in')
                    ->sum('total_amount'),
            ],
            'takeaway' => [
                'today' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'takeaway')
                    ->whereDate('created_at', today())
                    ->sum('total_amount'),
                'thisWeek' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'takeaway')
                    ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->sum('total_amount'),
                'thisMonth' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'takeaway')
                    ->whereMonth('created_at', now()->month)
                    ->sum('total_amount'),
                'allTime' => Order::where('status', Order::STATUS_COMPLETED)
                    ->where('order_type', 'takeaway')
                    ->sum('total_amount'),
            ],
        ];

        $totalPendapatan = [
            'today' => $pendapatanOrder['dine_in']['today'] + $pendapatanOrder['takeaway']['today'],
            'thisWeek' => $pendapatanOrder['dine_in']['thisWeek'] + $pendapatanOrder['takeaway']['thisWeek'],
            'thisMonth' => $pendapatanOrder['dine_in']['thisMonth'] + $pendapatanOrder['takeaway']['thisMonth'],
            'allTime' => $pendapatanOrder['dine_in']['allTime'] + $pendapatanOrder['takeaway']['allTime'],
        ];

        $topSellers = OrderDetail::select('menu_id', DB::raw('SUM(quantity) as total'))
            ->join('orders', 'orders.order_id', '=', 'order_details.order_id')
            ->where('orders.status', Order::STATUS_COMPLETED)
            ->groupBy('menu_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $topMenus = [];

        foreach ($topSellers as $item) {
            $menu = Menu::find($item->menu_id);

            if ($menu) {
                $topMenus[] = [
                    'menu' => $menu,
                    'total_order' => $item->total,
                    'pendapatan' => $item->total * $menu->price,
                ];
            }
        }

        $dineInCount = Order::where('order_type', 'dine_in')
            ->where('status', Order::STATUS_COMPLETED)
            ->count();

        $takeawayCount = Order::where('order_type', 'takeaway')
            ->where('status', Order::STATUS_COMPLETED)
            ->count();

        $makananCount = OrderDetail::whereHas('order', function ($q) {
            $q->where('status', Order::STATUS_COMPLETED);
        })->whereHas('menu', function ($q) {
            $q->where('category', 'Makanan');
        })->count();

        $minumanCount = OrderDetail::whereHas('order', function ($q) {
            $q->where('status', Order::STATUS_COMPLETED);
        })->whereHas('menu', function ($q) {
            $q->where('category', 'Minuman');
        })->count();

        $snackCount = OrderDetail::whereHas('order', function ($q) {
            $q->where('status', Order::STATUS_COMPLETED);
        })->whereHas('menu', function ($q) {
            $q->where('category', 'Snack');
        })->count();

        $latestOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        $latestReservations = Reservation::with('user')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalMenu',
            'totalOrderHariIni',
            'totalReservasiHariIni',
            'pendapatanOrder',
            'totalPendapatan',
            'topMenus',
            'dineInCount',
            'takeawayCount',
            'makananCount',
            'minumanCount',
            'snackCount',
            'latestOrders',
            'latestReservations'
        ));
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile', compact('user'));
    }
}
