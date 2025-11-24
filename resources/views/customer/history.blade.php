@extends('layouts.main')

@section('content')
<div class="row pt-4">
    
    <div class="col-12 text-center mb-5">
        <h2 class="font-weight-bold text-danger">Riwayat Aktivitas</h2>
    </div>

    <div class="col-12 mb-4">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-shopping-basket mr-2"></i> Riwayat Pesanan
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="font-weight-bold">#{{ $order->order_id }}</td>
                            <td>{{ $order->order_time->format('d M Y, H:i') }}</td>
                            <td>{{ ucfirst($order->order_type) }}</td>
                            <td class="font-weight-bold text-danger">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge badge-warning">Menunggu</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-danger">Batal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-3 text-muted">Belum ada pesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-calendar-check mr-2"></i> Riwayat Reservasi
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Jadwal</th>
                            <th>Meja</th>
                            <th>Orang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $res)
                        <tr>
                            <td>{{ $res->reservation_time->format('d M Y, H:i') }}</td>
                            <td>Meja {{ $res->table_number }}</td>
                            <td>{{ $res->amount_people }}</td>
                            <td>
                                @if($res->status == 'pending')
                                    <span class="badge badge-warning">Menunggu</span>
                                @elseif($res->status == 'confirmed')
                                    <span class="badge badge-success">Disetujui</span>
                                @else
                                    <span class="badge badge-danger">Batal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-3 text-muted">Belum ada reservasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection