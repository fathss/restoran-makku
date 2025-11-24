@extends('layouts.main')

@section('content')
<div class="row pt-3">
    
    <div class="col-12 text-center mb-4">
        <h2 class="font-weight-bold" style="color: #ff3b30;">Daftar Menu Kami</h2>
    </div>

    <div class="col-md-6 offset-md-3 mb-4">
        <form action="{{ route('menu.index') }}" method="GET">
            <div class="input-group input-group-lg">
                <input type="text" name="search" class="form-control" placeholder="Mau makan apa hari ini?" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12">
        <div class="container">
            <div class="row">
                @forelse($menus as $menu)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 card-outline card-danger shadow-sm hover-effect">
                        
                        <img src="{{ $menu->image_url ? asset($menu->image_url) : 'https://placehold.co/300x200?text=No+Image' }}" 
                            class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="font-weight-bold">{{ $menu->menu_name }}</h5>
                            
                            <p class="text-muted small flex-fill">
                                {{ Str::limit($menu->description, 50) }}
                            </p>
                            
                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-danger font-weight-bold h5 mb-0">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </span>
                                
                                @auth
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 font-weight-bold">
                                            <i class="fas fa-plus mr-1"></i> Pesan
                                        </button>
                                    </form>
                                @else
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 font-weight-bold" data-toggle="modal" data-target="#authModal">
                                        <i class="fas fa-plus mr-1"></i> Pesan
                                    </button>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-default-warning">
                        <i class="fas fa-search fa-2x mb-3 d-block"></i>
                        <h5>Yah, menu tidak ditemukan...</h5>
                        <p>Coba cari kata kunci lain atau kembali lagi nanti.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection