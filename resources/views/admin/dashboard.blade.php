@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Admin Dashboard')

{{-- Main Content --}}
@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <hr>

    {{-- Baris 1 --}}
    <div class="row">
        <!-- Total Menu -->
        <div class="col-lg-4 col-6">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-utensils"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Menu</span>
                    <span class="info-box-number">{{ $totalMenu }}</span>
                </div>
            </div>
        </div>
        
        <!-- Total Order Hari Ini -->
        <div class="col-lg-4 col-6">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Order Hari Ini</span>
                    <span class="info-box-number">{{ $totalOrderHariIni }}</span>
                </div>
            </div>
        </div>
        
        <!-- Total Reservasi Hari Ini -->
        <div class="col-lg-4 col-6">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-calendar-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Reservasi Hari Ini</span>
                    <span class="info-box-number">{{ $totalReservasiHariIni }}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- / Baris 1 --}}

    <h3 class="mb-3 mt-4">Laporan Keuangan</h3>

    {{-- Baris 2 --}}
    <div class="row">
        {{-- Menu Terlaris --}}
        <div class="col-lg-6 col-12">
            <div class="card card-outline card-danger h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-fire mr-1"></i> 5 Menu Terlaris
                    </h3>
                </div>

                <div class="card-body p-3">

                    @forelse ($topMenus as $index => $item)
                        @php 
                            $menu = $item['menu'];
                        @endphp

                        <div class="d-flex mb-3">
                            <div style="width: 70px; height: 70px;">
                                <img src="{{ asset($menu->image_url) }}"
                                    alt="{{ $menu->menu_name }}"
                                    class="img-fluid rounded"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            <div class="ml-3 d-flex flex-column justify-content-center">
                                <h6 class="mb-1">#{{ $index + 1 }} - {{ $menu->menu_name }}</h6>

                                <small class="text-muted">
                                    Harga: <strong>Rp {{ number_format($menu->price, 0, ',', '.') }}</strong>
                                </small>

                                <small class="text-muted">
                                    Order: <strong>{{ $item['total_order'] }}x</strong>
                                </small>

                                <small class="text-muted">
                                    Pendapatan: <strong>Rp {{ number_format($item['pendapatan'], 0, ',', '.') }}</strong>
                                </small>
                            </div>
                        </div>

                    @empty
                        <p class="text-muted text-center">Belum ada penjualan.</p>
                    @endforelse

                    <a href="{{ route('admin.menus.index') }}" class="btn btn-primary btn-block mt-2">
                        Lihat Semua Menu
                    </a>

                </div>
            </div>
        </div>
        {{-- / Menu Terlaris --}}

        {{-- Pie Chart --}}
        <div class="col-lg-6 col-12">
            <div class="card card-outline card-danger h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Rasio Order & Tipe Menu</h3>

                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto" id="chart-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#orderType" data-toggle="tab">Tipe Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#menuType" data-toggle="tab">Tipe Menu</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="tab-content w-100">
                        {{-- Order Type --}}
                        <div class="tab-pane active" id="orderType">
                            <div style="height:300px;">
                                <canvas id="orderTypePieChart"></canvas>
                            </div>
                            <div class="mt-3 text-center">
                                <p class="mb-1">Total Dine-in: <strong>{{ $dineInCount }}</strong></p>
                                <p>Total Takeaway: <strong>{{ $takeawayCount }}</strong></p>
                            </div>
                        </div>
                        {{-- / Order Type --}}

                        {{-- Menu Types --}}
                        <div class="tab-pane" id="menuType">
                            <div style="height:300px;">
                                <canvas id="menuTypePieChart"></canvas>
                            </div>
                            <div class="mt-3 text-center">
                                <p class="mb-1">Total Makanan: <strong>{{ $makananCount }}</strong></p>
                                <p class="mb-1">Total Minuman: <strong>{{ $minumanCount }}</strong></p>
                                <p>Total Snack: <strong>{{ $snackCount }}</strong></p>
                            </div>
                        </div>
                        {{-- / Menu Type --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- / Pie Chart --}}
    </div>
    {{-- / Baris 2--}}

    <h3 class="mb-3 mt-5">Aktivitas Terbaru</h3>

    {{-- Baris 3 --}}
    <div class="row">
        
        {{-- Pesanan Terbaru --}}
        <div class="col-lg-6">
            <div class="card card-danger card-outline card-head-fixed">
                <div class="card-header">
                    <h3 class="card-title">Pesanan Terbaru</h3>
                </div>

                <div class="card-body p-0" style="height: 350px; overflow-y: auto;">
                    <table class="table table-head-fixed text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestOrders as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-warning">{{ $order->status }}</span>
                                        @elseif ($order->status == 'completed')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-info"
                                            data-toggle="modal"
                                            data-target="#orderDetailModal{{ $order->order_id }}">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach($latestOrders as $order)
                        @include('partials.admin.orders.order-detail-modal', ['order' => $order])
                    @endforeach
                </div>

                <div class="card-footer clearfix">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-danger float-right">Lihat Semua Orders</a>
                </div>
            </div>
        </div>
        {{-- / Pesanan Terbaru --}}

        {{-- Reservasi Terbaru --}}
        <div class="col-lg-6">
            <div class="card card-danger card-outline card-head-fixed">
                <div class="card-header">
                    <h3 class="card-title">Reservasi Terbaru</h3>
                </div>

                <div class="card-body p-0" style="height: 350px; overflow-y: auto;">
                    <table class="table table-head-fixed text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>Reserv. ID</th>
                                <th>Customer</th>
                                <th>Total Guest</th>
                                <th>Status</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestReservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->reservation_id }}</td>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>{{ $reservation->amount_people }}</td>
                                    <td>
                                        @if ($reservation->status == 'pending')
                                            <span class="badge badge-warning">{{ $reservation->status }}</span>
                                        @elseif ($reservation->status == 'completed')
                                            <span class="badge badge-success">{{ $reservation->status }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $reservation->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-info"
                                            data-toggle="modal"
                                            data-target="#reservationModal{{ $reservation->reservation_id }}">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach($latestReservations as $reservation)
                        @include('partials.admin.reservations.reservation-detail-modal', ['reservation' => $reservation])
                    @endforeach
                </div>
                
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-sm btn-danger float-right">Lihat Semua Reservasi</a>
                </div>
            </div>
        </div>
        {{-- / Reservasi Terbaru --}}
    </div>
    {{-- / Baris 2 --}}

    <h3 class="mb-3 mt-4">Laporan Penjualan</h3>

    {{-- Baris 3 --}}
    <div class="row">
        {{-- Laporan Pendapatan --}}
        <div class="col-lg-12">
            <div class="card card-outline card-success h-100">
                {{-- Card Header & Tools --}}
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Detail Pendapatan</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto" id="revenue-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#today" data-toggle="tab">Hari Ini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#week" data-toggle="tab">Minggu Ini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#month" data-toggle="tab">Bulan Ini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#alltime" data-toggle="tab">Selama Ini</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- / Card Header & Tools --}}

                {{-- Card Body --}}
                <div class="card-body">
                    <div class="tab-content">
                        {{-- Hari Ini --}}
                        <div class="tab-pane active" id="today">
                            <h4>Hari Ini</h4>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Dine In</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['dine_in']['today'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Takeaway</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['takeaway']['today'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN HARI INI</span>
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatan['today'],0,',','.') }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- / Hari Ini --}}

                        {{-- Minggu Ini --}}
                        <div class="tab-pane" id="week">
                            <h4>Minggu Ini</h4>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Dine In</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['dine_in']['thisWeek'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Takeaway</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['takeaway']['thisWeek'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN MINGGU INI</span>
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatan['thisWeek'],0,',','.') }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- / Minggu Ini --}}

                        {{-- Bulan Ini --}}
                        <div class="tab-pane" id="month">
                            <h4>Bulan Ini</h4>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Dine In</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['dine_in']['thisMonth'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Takeaway</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['takeaway']['thisMonth'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN BULAN INI</span>
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatan['thisMonth'],0,',','.') }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- / Bulan Ini --}}

                        {{-- Selama Ini --}}
                        <div class="tab-pane" id="alltime">
                            <h4>Selama Ini</h4>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Dine In</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['dine_in']['allTime'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Takeaway</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder['takeaway']['allTime'],0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN</span>
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatan['allTime'],0,',','.') }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- / Selama Ini --}}
                    </div>
                </div>
                {{-- / Card Body --}}
            </div>
        </div>
        {{-- / Laporan Pendapatan --}}
    </div>
    {{-- / Baris 3 --}}
@endsection

@section('script')
    @include('partials.admin.chart.pie-chart-script')
@endsection