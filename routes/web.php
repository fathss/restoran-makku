<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/admin', function () {
    return view('admin.adminlte');
});

Route::get('/customer', function () {
    return view('customer.index');
});
