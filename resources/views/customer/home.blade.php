@extends('layouts.main') 

@section('content')

<div class="position-relative">
    
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
        
        <div class="carousel-indicators z-index-2">
            <button type="button" data-target="#heroCarousel" data-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-target="#heroCarousel" data-slide-to="1"></button>
            <button type="button" data-target="#heroCarousel" data-slide-to="2"></button>
            <button type="button" data-target="#heroCarousel" data-slide-to="3"></button>
            <button type="button" data-target="#heroCarousel" data-slide-to="4"></button>
        </div>

        <div class="carousel-inner">
            
            <div class="carousel-item active" style="height: 500px;"> 
                <img src="{{ asset('img/slide-1.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
            
            <div class="carousel-item" style="height: 500px;">
                <img src="{{ asset('img/slide-2.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>

            <div class="carousel-item" style="height: 500px;">
                <img src="{{ asset('img/slide-3.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>

            <div class="carousel-item" style="height: 500px;">
                <img src="{{ asset('img/slide-4.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>

            <div class="carousel-item" style="height: 500px;">
                <img src="{{ asset('img/slide-5.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
        </div>
        
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <div class="hero-text position-absolute top-50 start-50 translate-middle text-center text-white w-100 z-index-1 px-3">
        <h1 class="display-3 fw-bold">Selamat Datang di Resto <span class="brand-logo-home">Makku</span></h1>
        <p class="lead mb-4">Nikmati hidangan lezat dengan harga bersahabat.</p>
        <a href="{{ route('menu.index') }}" class="btn btn-warning btn-lg fw-bold">Lihat Menu</a>
    </div>

</div>
<div class="mt-5"> 
    <h2 class="text-center mb-4 fw-bold text-makku">Menu Terbaru</h2>
    <div class="row">
        @forelse($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ $menu->image_url ?? 'https://dummyimage.com/600x400/000/fff&text=Menu' }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $menu->menu_name }}</h5>
                    <p class="text-price-makku">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">Belum ada menu yang ditambahkan.</div>
        </div>
        @endforelse
    </div>
</div>

@endsection