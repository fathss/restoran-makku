@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Admin Dashboard')

{{-- Main Content --}}
@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <hr>

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

    <h3 class="mb-3 mt-4">Laporan</h3>

    <div class="row">
        {{-- Left Column: Laporan Pendapatan Hari Ini --}}
        <div class="col-lg-6">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Detail Pendapatan</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto" id="revenue-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#today" data-toggle="tab">Hari Ini</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#alltime" data-toggle="tab">Selama Ini</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <!-- Tab Hari Ini -->
                        <div class="tab-pane active" id="today">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Order Dine In</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrderHariIni->dine_in,0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Order Takeaway</span>
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrderHariIni->takeaway,0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN HARI INI</span>
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatanHariIni,0,',','.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Selama Ini -->
                        <div class="tab-pane" id="alltime">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info"><i class="fas fa-shopping-basket"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Order Dine In</span>
                                    {{-- <span class="info-box-number">Rp {{ number_format($pendapatanOrderDineInAllTime,0,',','.') }}</span> --}}
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder->dine_in,0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info"><i class="fas fa-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Order Takeaway</span>
                                    {{-- <span class="info-box-number">Rp {{ number_format($pendapatanOrderTakeawayAllTime,0,',','.') }}</span> --}}
                                    <span class="info-box-number">Rp {{ number_format($pendapatanOrder->takeaway,0,',','.') }}</span>
                                </div>
                            </div>
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">TOTAL PENDAPATAN</span>
                                    {{-- <span class="info-box-number">Rp {{ number_format($totalPendapatanAllTime,0,',','.') }}</span> --}}
                                    <span class="info-box-number">Rp {{ number_format($totalPendapatan,0,',','.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Top Seller --}}
        <div class="col-lg-6 col-12">
            <div class="card card-outline card-danger h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-fire mr-1"></i> Menu Terlaris #1</h3>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                    <div class="d-flex flex-column flex-md-row align-items-stretch h-100">

                        <!-- Gambar Menu -->
                        <div class="flex-shrink-0 mb-3 mb-md-0" style="width: 100%; max-width: 250px;">
                            <img src="{{ asset($menuTerlaris->image_url) }}" alt="{{ $menuTerlaris->menu_name }}"
                                class="img-fluid rounded" style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <!-- Info Menu -->
                        <div class="flex-grow-1 ml-md-3 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="mb-3">Nama Menu: <strong>{{ $menuTerlaris->menu_name }}</strong></h5>
                                <p class="mb-2">Harga: <strong>Rp {{ number_format($menuTerlaris->price, 0, ',', '.') }}</strong></p>
                                <p class="mb-2">Total Order: <strong>{{ $totalOrderMenu }}x</strong></p>
                                <p class="mb-3">Total Pendapatan: <strong>Rp {{ number_format($totalPendapatanMenu, 0, ',' ,'.') }}</strong></p>
                            </div>
                            <div>
                                <a href="{{ route('admin.menus.index') }}" class="btn btn-primary btn-block">
                                    Lihat Semua Menu
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- / Row 2 --}}

    <h3 class="mb-3 mt-5">Aktivitas Terbaru</h3>

    <!-- Baris 2: Latest Orders dan Latest Reservations (Dua Card per Baris) -->
    <div class="row">
        
        <!-- Table 1: Latest Orders -->
        <div class="col-lg-6">
            <!-- class 'card-head-fixed' dipertahankan untuk fixed header -->
            <div class="card card-danger card-outline card-head-fixed">
                
                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title">Pesanan Terbaru</h3>
                </div>

                <!-- Card Body (Wadah Konten Tabel) -->
                <!-- height: 350px dan overflow-y: auto adalah kunci fixed header table AdminLTE 3 -->
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
                <!-- /Card Body -->
                
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-danger float-right">Lihat Semua Orders</a>
                </div>
            </div>
            <!-- /Card Latest Orders -->
        </div>

        <!-- Table 2: Latest Reservations -->
        <div class="col-lg-6">
            <div class="card card-danger card-outline card-head-fixed">
                
                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title">Reservasi Terbaru</h3>
                </div>

                <!-- Card Body (Wadah Konten Tabel) -->
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
                <!-- /Card Body -->
                
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-sm btn-danger float-right">Lihat Semua Reservasi</a>
                </div>
            </div>
            <!-- /Card Latest Reservations -->
        </div>

    </div>
    <!-- / Baris 2 -->
@endsection