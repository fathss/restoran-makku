@extends('layouts.dashboard-app')

@section('title', 'Profile Page')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="https://www.gravatar.com/avatar/?d=mp"
                        alt="User profile picture">
                    <h3 class="profile-username text-center">Admin</h3>
                    <p class="text-muted text-center">{{ $user->name }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Informasi Akun</h3>
                </div>

                <div class="card-body">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info"><i class="fas fa-phone"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Nomor Telepon</span>
                            <span class="info-box-number">{{ $user->phone }}</span>
                        </div>
                    </div>
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Alamat</span>
                            <span class="info-box-number">{{ $user->email }}</span>
                        </div>
                    </div>
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning"><i class="fas fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tanggal Bergabung</span>
                            <span class="info-box-number">
                                {{ $user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection