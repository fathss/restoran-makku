@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Menu Management')

{{-- Main Content --}}
@section('content')
    <h1 class="text-center text-makku mb-4">Daftar Menu</h1>

    <div class="row justify-content-center mb-5 ms-5">
        <div class="col-md-9 d-flex align-items-center justify-content-center gap-2">
            <div class="flex-grow-1">
                <form action="{{ route('admin.menus.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control rounded-pill" placeholder="Cari Menu" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-danger rounded-pill px-4 py-2">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($menus as $menu)
            @include('partials.admin.menus.menu-card')
        @endforeach
    </div>
@endsection