@extends('layouts.main') 

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            
            <ol class="carousel-indicators">
                <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#heroCarousel" data-slide-to="1"></li>
                <li data-target="#heroCarousel" data-slide-to="2"></li>
                <li data-target="#heroCarousel" data-slide-to="3"></li>
                <li data-target="#heroCarousel" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner rounded shadow-sm">
                <div class="carousel-item active" style="height: 550px;"> 
                    <img src="{{ asset('img/slide-1.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('img/slide-2.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('img/slide-3.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('img/slide-4.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('img/slide-5.png') }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
                </div>
            </div>

            <div class="hero-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%; z-index: 10;">
                <h1 class="display-4 font-weight-bold text-white">Selamat Datang di <span style="font-family: 'Dancing Script';">Makku</span></h1>
                <p class="lead text-white mb-4">Nikmati hidangan lezat dengan harga bersahabat.</p>
                <a href="{{ route('menu.index') }}" class="btn btn-danger btn-lg rounded-pill px-5 font-weight-bold shadow">Lihat Menu</a>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2 class="font-weight-bold" style="color: #ff3b30;">Menu Unggulan</h2>
        </div>

        @forelse($menus as $menu)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 card-outline card-danger hover-effect">
                @php
                    $imgData = $menu->image_url;

                    if (is_array($imgData) && count($imgData) > 0) {
                        $singleImage = $imgData[0];
                    } 
                    else {
                        $singleImage = $imgData;
                    }
                @endphp

                <img src="{{ $singleImage ? asset($singleImage) : 'https://placehold.co/300x200' }}" 
                     class="card-img-top" style="height: 220px; object-fit: cover;" alt="...">

                <div class="card-body text-center">
                    <h5 class="font-weight-bold">{{ $menu->menu_name }}</h5>
                    <p class="text-danger font-weight-bold h5 mt-2">
                        Rp {{ number_format($menu->price, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-default-info">Belum ada menu yang ditambahkan.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection