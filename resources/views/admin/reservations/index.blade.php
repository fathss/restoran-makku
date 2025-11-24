@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Reservation Management')

{{-- Main Content --}}
@section('content')
    <h1 class="text-center text-makku">Daftar Reservasi Pelanggan</h1>

    <div class="row justify-content-center mb-5 ml-5">
        <div class="col-md-9 d-flex align-items-center justify-content-center">
            <div class="flex-grow-1 mr-2"> 
                <form action="{{ route('admin.reservations.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control rounded-pill mr-2" placeholder="Cari Reservasi" value="{{ request('search') }}">
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
        'count' => $pendingReservations->count(),
        'badgeColor' => 'warning',
        'items' => $pendingReservations,
        'cardPartial' => 'partials.admin.reservations.reservation-card',
        'itemName' => 'reservation'
    ])

    {{-- Completed --}}
    @include('partials.admin.shared.status-section', [
        'title' => 'Completed',
        'icon' => 'fas fa-circle-check',
        'count' => $completedReservations->count(),
        'badgeColor' => 'success',
        'items' => $completedReservations,
        'cardPartial' => 'partials.admin.reservations.reservation-card',
        'itemName' => 'reservation'
    ])

    {{-- Canceled --}}
    @include('partials.admin.shared.status-section', [
        'title' => 'Canceled',
        'icon' => 'fas fa-circle-xmark',
        'count' => $canceledReservations->count(),
        'badgeColor' => 'secondary',
        'items' => $canceledReservations,
        'cardPartial' => 'partials.admin.reservations.reservation-card',
        'itemName' => 'reservation'
    ])
@endsection