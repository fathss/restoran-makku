@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-makku">Daftar Menu Kami</h2>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="{{ route('menu.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control rounded-pill" placeholder="Mau makan apa hari ini?" value="{{ request('search') }}">
                <button type="submit" class="btn btn-danger rounded-pill px-4">Cari</button>
            </form>
        </div>
    </div>

    <div class="row">
        
        @forelse($menus as $menu)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0 hover-effect">
                
                <img src="{{ $menu->image_url ? asset($menu->image_url) : 'https://placehold.co/300x200?text=No+Image' }}" 
                    class="card-img-top menu-img" 
                    alt="{{ $menu->menu_name }}">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $menu->menu_name }}</h5>
                    
                    <p class="text-muted small flex-grow-1">
                        {{ Str::limit($menu->description, 50) }}
                    </p>
                    
                    <hr class="my-2">

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="fw-bold text-danger fs-5">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </span>
                        
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                    <i class="fas fa-plus"></i> Pesan
                                </button>
                            </form>
                        @else
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#authModal">
                                <i class="fas fa-plus"></i> Pesan
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-light border text-muted">
                <i class="fas fa-search fa-3x mb-3 text-danger"></i>
                <h4>Yah, menu tidak ditemukan...</h4>
                <p>Coba cari kata kunci lain atau kembali lagi nanti.</p>
            </div>
        </div>
        @endforelse

    </div>
</div>
@endsection