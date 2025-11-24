@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Order Management')

{{-- Main Content --}}
@section('content')
    <h1 class="text-center text-makku mb-4">Daftar Pesanan Pelanggan</h1>

    <div class="row justify-content-center mb-5 ms-5">
        <div class="col-md-9 d-flex align-items-center justify-content-center gap-2">
            <div class="flex-grow-1">
                <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control rounded-pill" placeholder="Cari Pesanan">
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($orders as $order)
            @include('partials.admin.orders.order-card')
        @endforeach
    </div>
@endsection