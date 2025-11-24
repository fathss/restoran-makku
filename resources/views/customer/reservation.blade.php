@extends('layouts.main')

@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-md-6">
        
        <div class="card card-outline card-danger shadow-lg">
            <div class="card-header text-center bg-white border-bottom-0">
                <h3 class="card-title font-weight-bold text-danger" style="float: none; font-size: 1.5rem;">
                    <i class="fas fa-utensils mr-2"></i> Reservasi Meja
                </h3>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-secondary">Jumlah Orang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-users text-danger"></i></span>
                            </div>
                            <input type="number" name="amount_people" class="form-control" min="1" placeholder="Contoh: 2" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-secondary">Tanggal & Jam</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-danger"></i></span>
                            </div>
                            <input type="datetime-local" name="reservation_time" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-secondary">Nomor Meja (Opsional)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-chair text-danger"></i></span>
                            </div>
                            <input type="number" name="table_number" class="form-control" placeholder="Kosongkan jika ingin dipilihkan otomatis">
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-danger btn-block rounded-pill font-weight-bold py-2 shadow-sm">
                            Booking Sekarang
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection