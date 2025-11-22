@extends('layouts.main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 mb-4" style="border-radius: 10px;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">Informasi Profil</h5>
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4" style="border-radius: 10px;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-warning">Ganti Password</h5>
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4" style="border-radius: 10px;">
                <div class="card-header bg-danger text-white py-3">
                    <h5 class="mb-0 fw-bold">Hapus Akun</h5>
                </div>
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection