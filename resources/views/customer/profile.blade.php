@extends('layouts.main')

@section('content')
<div class="row pt-4 justify-content-center">
    <div class="col-md-5">
        
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center mb-3">
                    <i class="fas fa-user-circle fa-4x text-danger"></i>
                </div>

                <h3 class="profile-username text-center font-weight-bold">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Nomor Telepon</b> <a class="float-right">{{ $user->phone ?? '-' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right">{{ Str::limit($user->address ?? '-', 30) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Bergabung</b> <a class="float-right">{{ $user->created_at->format('d M Y') }}</a>
                    </li>
                </ul>

                <a href="{{ route('profile.edit') }}" class="btn btn-danger btn-block rounded-pill font-weight-bold">
                    <i class="fas fa-edit mr-2"></i> Edit Profil
                </a>
            </div>
        </div>

    </div>
</div>
@endsection