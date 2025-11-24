<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.admin.sidebar'], function ($view) {
            $totalPendingOrders = Order::where('status', Order::STATUS_PENDING)->count();
            $totalPendingReservations = Reservation::where('status', Reservation::STATUS_PENDING)->count();
            $totalPendings = $totalPendingOrders + $totalPendingReservations;

            $view->with([
                'totalPendingOrders' => $totalPendingOrders,
                'totalPendingReservations' => $totalPendingReservations,
                'totalPendings' => $totalPendings,
            ]);
        });
    }
}
