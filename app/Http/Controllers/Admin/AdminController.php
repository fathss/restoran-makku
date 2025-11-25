<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
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

        // Order & Reservasi Hari Ini
        $totalOrderHariIni = Order::whereDate('created_at', now())->count();
        $totalReservasiHariIni = Reservation::whereDate('created_at', now())->count();

        $pendapatanOrderHariIni = Order::whereDate('created_at', now())
            ->where('status', Order::STATUS_COMPLETED)
            ->select(
                DB::raw("SUM(CASE WHEN order_type = 'dine_in' THEN total_amount ELSE 0 END) as dine_in"),
                DB::raw("SUM(CASE WHEN order_type = 'takeaway' THEN total_amount ELSE 0 END) as takeaway")
            )
            ->first();

        $totalPendapatanHariIni = $pendapatanOrderHariIni->dine_in + $pendapatanOrderHariIni->takeaway;

        // Pendapatan Order & Reservasi selama ini
        $pendapatanOrder = Order::where('status', Order::STATUS_COMPLETED)
            ->select(
                DB::raw("SUM(CASE WHEN order_type = 'dine_in' THEN total_amount ELSE 0 END) as dine_in"),
                DB::raw("SUM(CASE WHEN order_type = 'takeaway' THEN total_amount ELSE 0 END) as takeaway")
            )
            ->first();

        $totalPendapatan = $pendapatanOrder->dine_in + $pendapatanOrder->takeaway;

        $query = OrderDetail::select('menu_id', DB::raw('SUM(quantity) as total'))
            ->join('orders', 'orders.order_id', '=', 'order_details.order_id')
            ->whereDate('orders.created_at', now())
            ->where('orders.status', Order::STATUS_COMPLETED)
            ->groupBy('menu_id')
            ->orderByDesc('total')
            ->first();

        if ($query) {
            $menuTerlaris = Menu::find($query->menu_id);
            $totalOrderMenu = $query->total;
            $totalPendapatanMenu = $totalOrderMenu * $menuTerlaris->price;
        } else {
            $menuTerlaris = null;
            $totalOrderMenu = 0;
            $totalPendapatanMenu = 0;
        }

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
            'pendapatanOrderHariIni',
            'totalPendapatanHariIni',
            'pendapatanOrder',
            'totalPendapatan',
            'menuTerlaris',
            'totalOrderMenu',
            'totalPendapatanMenu',
            'latestOrders',
            'latestReservations'
        ));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile', compact('user'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $user = User::findOrFail($id);

    //     return view('admin.edit-profile', compact('user'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(ProfileUpdateRequest $request, string $id)
    // {
    //     $user = User::findOrFail($id);

    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return redirect('admin.profile', compact($user))
    //         ->with('success', 'Informasi profil berhasil diperbarui.')
    //         ->with('type', 'profile');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
