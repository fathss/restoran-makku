<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;


Route::get('/adminlte', function () {
    return view('admin.adminlte');
});

Route::middleware(['auth', 'adminOnly'])->group(function () {
    // Menu Management
    Route::resource('/admin/menus', Admin\AdminMenuController::class)->names('admin.menus');

    // Order Management
    Route::resource('/admin/orders', Admin\AdminOrderController::class)->names('admin.orders');

    // Reservation Management
    Route::resource('/admin/reservations', Admin\AdminReservationController::class)->names('admin.reservations');

    // Dashboard Admin
    Route::resource('/admin', Admin\AdminController::class)->names('admin');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// tanpa login
// Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Menu & Search
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');


// ketika login
Route::middleware('auth')->group(function () {


    //Fitur Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

    //Fitur Reservasi
    Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

    //Fitur Profil
    //Lihat Profil
    Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.show');

    //Edit Profil & Password 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route Hapus Item
    Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    //Route Checkout
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');

    //Profil - Riwayat Pesanan
    Route::get('/my-history', [App\Http\Controllers\ProfileController::class, 'history'])->name('profile.history');

    //password
    Route::put('/user/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('user-password.update');

    // Route untuk Update Quantity
    Route::patch('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
});

require __DIR__ . '/auth.php';
