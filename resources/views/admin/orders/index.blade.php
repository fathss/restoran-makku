@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Order Management')

{{-- Main Content --}}
@section('content')
    <h1 class="text-center text-makku mr-4">Daftar Pesanan Pelanggan</h1>

    <div class="row justify-content-center mb-5 ml-5">
        <div class="col-md-9 d-flex align-items-center justify-content-center">
            <div class="flex-grow-1 mr-2"> 
                <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control rounded-pill mr-2" placeholder="Cari Pesanan" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Pending --}}
    @include('partials.admin.shared.status-section', [
        'title' => 'Pending',
        'icon' => 'bi bi-clock-fill',
        'count' => $pendingOrders->count(),
        'badgeColor' => 'warning',
        'items' => $pendingOrders,
        'cardPartial' => 'partials.admin.orders.order-card',
        'itemName' => 'order'
    ])

    {{-- Completed --}}
    @include('partials.admin.shared.status-section', [
        'title' => 'Completed',
        'icon' => 'fas fa-circle-check',
        'count' => $completedOrders->count(),
        'badgeColor' => 'success',
        'items' => $completedOrders,
        'cardPartial' => 'partials.admin.orders.order-card',
        'itemName' => 'order'
    ])

    {{-- Canceled --}}
    @include('partials.admin.shared.status-section', [
        'title' => 'Canceled',
        'icon' => 'fas fa-circle-xmark',
        'count' => $canceledOrders->count(),
        'badgeColor' => 'secondary',
        'items' => $canceledOrders,
        'cardPartial' => 'partials.admin.orders.order-card',
        'itemName' => 'order'
    ])
@endsection