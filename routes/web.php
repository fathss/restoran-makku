<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;


Route::get('/adminlte', function () {
    return view('admin.adminlte3');
});

Route::middleware(['auth', 'adminOnly'])->group(function () {
    // Menu Management
    Route::resource('/admin/menus', Admin\AdminMenuController::class)->names('admin.menus');

    // Order Management
    // Route::resource('/admin/orders', Admin\AdminOrderController::class)->names('admin.orders');
    Route::get('/admin/orders', [Admin\AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{order_id}/approve', [Admin\AdminOrderController::class, 'approve'])->name('admin.orders.approve');
    Route::get('/admin/orders/{order_id}/cancel', [Admin\AdminOrderController::class, 'cancel'])->name('admin.orders.cancel');

    // Reservation Management
    // Route::resource('/admin/reservations', Admin\AdminReservationController::class)->names('admin.reservations');
    Route::get('/admin/reservations', [Admin\AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/{reservation_id}/approve', [Admin\AdminReservationController::class, 'approve'])->name('admin.reservations.approve');
    Route::get('/admin/reservations/{reservation_id}/cancel', [Admin\AdminReservationController::class, 'cancel'])->name('admin.reservations.cancel');

    // Dashboard Admin
    Route::resource('/admin', Admin\AdminController::class)->names('admin');

    // Main Page
    Route::get('/', [Admin\AdminController::class, 'index'])->name('admin.page');

    //konfirmasi reservasi
    // Tambahkan di dalam Route Admin (middleware auth, adminOnly/checkrole)
    Route::post('/admin/reservations/{reservation}/confirm', [Admin\AdminReservationController::class, 'confirm'])->name('admin.reservations.confirm');

    // Route untuk menampilkan daftar reservasi dan pencarian
    Route::get('/admin/reservations', [Admin\AdminReservationController::class, 'index'])->name('admin.reservations.index');

    // Route PUT untuk update/modifikasi status, meja, dan waktu reservasi
    Route::put('/admin/reservations/{reservation}', [Admin\AdminReservationController::class, 'update'])->name('admin.reservations.update');
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
