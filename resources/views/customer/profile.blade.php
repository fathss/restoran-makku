@extends('layouts.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                    <h3 class="fw-bold">{{ $user->name }}</h3>
                    <p class="text-muted">{{ $user->email }}</p>
                    <span class="badge bg-success px-3 py-2">Role: {{ ucfirst($user->role) }}</span>

                    <hr class="my-4">

                    <div class="row text-start">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold text-muted small">Nomor Telepon</label>
                            <p class="fs-5">{{ $user->phone ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold text-muted small">Alamat</label>
                            <p class="fs-5">{{ $user->address ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profil & Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection