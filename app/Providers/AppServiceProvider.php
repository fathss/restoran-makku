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
        View::composer('partials.admin.sidebar', function ($view) {
            $totalOrders = Order::where('status', Order::STATUS_PENDING)->count();
            $totalReservations = Reservation::where('status', Reservation::STATUS_PENDING)->count();
            $totalTransactions = $totalOrders + $totalReservations;

            $view->with([
                'totalOrders' => $totalOrders,
                'totalReservations' => $totalReservations,
                'totalTransactions' => $totalTransactions,
            ]);
        });
    }
}
