@extends('layouts.main')

@section('content')
<div class="row pt-3 justify-content-center">
    <div class="col-md-8">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Informasi Profil</h3>
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Hapus Akun</h3>
            </div>
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection