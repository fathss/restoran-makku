@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-5 text-center text-makku">Riwayat Transaksi & Reservasi</h2>

    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0 fw-bold"><i class="fas fa-shopping-basket me-2"></i> Riwayat Pembelian Menu</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="fw-bold text-muted">#{{ $order->order_id }}</td>
                            <td>{{ $order->order_time->format('d M Y, H:i') }}</td>
                            <td>{{ ucfirst($order->order_type) }}</td>
                            <td class="fw-bold text-danger">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada riwayat pembelian menu.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0 fw-bold"><i class="fas fa-calendar-check me-2"></i> Riwayat Booking Meja</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal & Jam</th>
                            <th>Meja No.</th>
                            <th>Jumlah Orang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            <td>
                                {{ $reservation->reservation_time->format('d M Y') }} 
                                (Pukul: {{ $reservation->reservation_time->format('H:i') }})
                            </td>
                            <td>Meja {{ $reservation->table_number }}</td>
                            <td>{{ $reservation->amount_people }} orang</td>
                            <td>
                                @if($reservation->status == 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                @elseif($reservation->status == 'confirmed')
                                    <span class="badge bg-success">Dikonfirmasi</span>
                                @else
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada riwayat reservasi meja.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection