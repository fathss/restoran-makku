<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm border-0">

        <div class="card-header bg-danger text-white">
            <h5 class="card-title fw-bold">Reservasi #{{ $reservation->reservation_id }}</h5>
        </div>

        <div class="card-body">
            <p><strong>Nama Pelanggan:</strong> {{ $reservation->user->name }}</p>
            <p><strong>Tanggal:</strong> {{ $reservation->reservation_time->format('d-m-Y') }}</p>
            <p><strong>Waktu:</strong> {{ $reservation->reservation_time->format('H:i') }}</p>
            <p><strong>Status:</strong>
                @include('partials.admin.shared.status-badge', ['status' => $reservation->status])
            </p>
        </div>

        <div class="card-footer d-flex justify-content-center">
            <button 
                class="btn btn-outline-primary"
                data-toggle="modal"
                data-target="#reservationModal{{ $reservation->reservation_id }}">
                <i class="fas fa-search"></i>
            </button>
            @if ($reservation->status == 'pending')
                <a href="{{ route('admin.reservations.approve', $reservation->reservation_id) }}" class="btn btn-outline-success ml-2 mr-2">
                    <i class="bi bi-check-lg"></i>
                </a>
                <a href="{{ route('admin.reservations.cancel', $reservation->reservation_id) }}" class="btn btn-outline-danger">
                    <i class="bi bi-x"></i>
                </a>
            @endif
        </div>
    </div>
</div>

@include('partials.admin.reservations.reservation-detail-modal', ['reservation' => $reservation])
