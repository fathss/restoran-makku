<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title fw-bold">Reservasi #{{ $reservation->reservation_id }}</h5>
        </div>
        <div class="card-body d-flex flex-column">
            <p class="card-text"><strong>Nama Pelanggan:</strong> {{ $reservation->user->name }}</p>
            <p class="card-text"><strong>Tanggal Reservasi:</strong> {{ $reservation->reservation_time->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Waktu Reservasi:</strong> {{ $reservation->reservation_time->format('H:i') }}</p>
            <p class="card-text"><strong>Jumlah Tamu:</strong> {{ $reservation->amount_people }}</p>
            <p class="card-text"><strong>Status:</strong> 
                <span class="badge bg-warning text-dark">Pending</span>
            </p>
        </div>
        <div class="card-footer mb-2">
            <div class="d-flex justify-content-center align-items-center mt-2">
                <a href="{{ route('admin.reservations.approve', $reservation->reservation_id) }}" class="btn btn-success me-2">
                    <i class="bi bi-check-lg"></i>
                </a>
                <a href="{{ route('admin.reservations.cancel', $reservation->reservation_id) }}" class="btn btn-danger">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </div>
    </div>
</div>