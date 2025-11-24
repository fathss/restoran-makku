<div class="modal fade" id="reservationModal{{ $reservation->reservation_id }}" tabindex="-1"
    aria-labelledby="reservationModal{{ $reservation->reservation_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    Detail Reservasi #{{ $reservation->reservation_id }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Nama Pelanggan:</strong><br> {{ $reservation->user->name }}</p>
                        <p><strong>Email:</strong><br> {{ $reservation->user->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Status:</strong><br>
                            @include('partials.admin.shared.status-badge', ['status' => $reservation->status])
                        </p>
                        <p><strong>Jumlah Tamu:</strong><br> {{ $reservation->amount_people }}</p>
                        <p><strong>Nomor Meja:</strong><br>
                            {{ $reservation->table_number ?? '-' }}
                        </p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Tanggal Reservasi:</strong><br>
                            {{ $reservation->reservation_time->format('d-m-Y') }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Waktu Reservasi:</strong><br>
                            {{ $reservation->reservation_time->format('H:i') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                @if ($reservation->status === 'pending')
                    <a href="{{ route('admin.reservations.approve', $reservation->reservation_id) }}"
                        class="btn btn-success mx-1">
                        <i class="bi bi-check-lg"></i> Terima
                    </a>

                    <a href="{{ route('admin.reservations.cancel', $reservation->reservation_id) }}"
                        class="btn btn-danger mx-1">
                        <i class="bi bi-x"></i> Tolak
                    </a>
                @endif
                <button class="btn btn-secondary mx-1" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
