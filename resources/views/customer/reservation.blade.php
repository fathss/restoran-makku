@extends('layouts.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                
                <div class="card-header text-white text-center py-3" style="background-color: #ff3b30;">
                    <h4 class="mb-0 fw-bold" style="font-family: 'Poppins', sans-serif;">Reservasi Meja</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Jumlah Orang</label>
                            <input type="number" name="amount_people" class="form-control p-3" min="1" placeholder="Contoh: 2" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Tanggal & Jam</label>
                            <input type="datetime-local" name="reservation_time" class="form-control p-3" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Nomor Meja (Opsional)</label>
                            <input type="number" name="table_number" class="form-control p-3" placeholder="Kosongkan jika ingin dipilihkan oleh sistem">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-danger fw-bold py-3 rounded-pill" style="background-color: #ff3b30; border: none; font-size: 1.1rem;">
                                Booking Sekarang
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection