<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makku - Restoran Enak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid px-5 d-flex align-items-center justify-content-between">
            
            <a class="brand-logo" href="{{ route('home') }}">
                Makku.
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="fas fa-bars text-makku"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                
                <ul class="navbar-nav ms-auto gap-4"> 
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu.index') }}">Menu</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('reservation.create') }}">Reservasi</a></li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#authModal">Reservasi</a>
                        </li>
                    @endauth
                </ul>

                <div class="d-flex align-items-center mt-3 mt-lg-0 gap-4">
                    
                    <form action="{{ route('menu.index') }}" method="GET" class="d-flex align-items-center border rounded-pill px-3 py-1 bg-white ">
                        <input type="text" name="search" class="form-control border-0 shadow-none p-0" placeholder="Cari..." style="width: 200px;">
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>

                    @auth
                        <a href="{{ route('cart.index') }}" class="icon-btn position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            
                            @if(session('cart') && count(session('cart')) > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" 
                                      style="font-size: 0.5rem; padding: 0.25rem 0.4rem;">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    @else
                        <button type="button" class="icon-btn bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    @endauth

                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="icon-btn dropdown-toggle" role="button" data-bs-toggle="dropdown" 
                               data-bs-display="static" aria-expanded="false" 
                               title="Halo, {{ Auth::user()->name }}">
                                <i class="fas fa-user-circle"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 10px;">
                                
                                <li><a class="dropdown-item fw-bold" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user me-2 text-primary"></i> Profil Saya
                                </a></li>
                                
                                <li><a class="dropdown-item fw-bold" href="{{ route('profile.history') }}">
                                    <i class="fas fa-history me-2 text-secondary"></i> Riwayat Pesanan
                                </a></li>
                                
                                <li><hr class="dropdown-divider"></li>
                                
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger fw-bold">
                                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <button type="button" class="icon-btn bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="far fa-user-circle"></i> 
                        </button>
                    @endauth

                </div>
            </div>
        </div>
    </nav>

    <main>

        @yield('content')
    </main>

    <footer class="footer text-center">
        <div class="container">
            <small>&copy; 2025 Makku Resto. All Rights Reserved.</small>
        </div>
    </footer>

    <div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> 
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5 px-5">
                    <div class="mb-3">
                        <span style="font-family: 'Dancing Script', cursive; font-size: 2.5rem; color: #ff3b30; font-weight: bold;">Makku.</span>
                    </div>
                    <h4 class="fw-bold mb-3">Selamat Datang!</h4>
                    <p class="text-muted mb-4">Silakan masuk ke akun Anda untuk melakukan reservasi dan memesan makanan.</p>
                    <div class="d-grid gap-3">
                        <a href="{{ route('login') }}" class="btn btn-makku-red rounded-pill">Masuk ke Akun</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-danger py-2 fw-bold rounded-pill">Daftar Akun Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-auto-show="{{ (session('success') || request('checkout_status') == 'success' || session('modal_error')) ? 'true' : 'false' }}">
        
        <div class="modal-dialog modal-dialog-centered modal-sm"> 
            <div class="modal-content border-0 shadow-lg text-center pt-4 pb-4 px-3" style="border-radius: 20px;">
                
                <div class="modal-body">
                    @php
                        // 1. Tentukan Kunci Utama (Error atau Sukses)
                        if (session()->has('modal_error')) {
                            $actionType = 'fail'; 
                            $message = session('modal_error'); 
                        } elseif (session('type')) {
                            $actionType = session('type'); 
                            $message = session('success'); 
                        } elseif (session()->has('status')) {
                            $actionType = 'profile'; 
                            $message = session('success');
                        } else {
                            $actionType = 'checkout'; 
                            $message = session('success');
                        }
                        
                        $isSuccess = ($actionType != 'fail');
                    @endphp

                    <div class="mb-3">
                        <i class="fas {{ $isSuccess ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}" 
                        style="font-size: 4rem;"></i>
                    </div>

                    <h4 class="fw-bold mb-2 {{ $actionType == 'fail' ? 'text-danger' : '' }}">
                        {{ $isSuccess ? 'Berhasil!' : 'Gagal!' }}
                    </h4>
                    
                    <p class="text-muted mb-4" id="successMessage">
                        {{ $message }}
                    </p>
                    
                    <div class="d-grid gap-2">

                        @if($actionType == 'fail')
                            <button type="button" class="btn btn-makku-red rounded-pill fw-bold" data-bs-dismiss="modal">
                                Oke, Coba Lagi
                            </button>
                        @elseif($actionType == 'cart')
                            <a href="{{ route('cart.index') }}" class="btn btn-makku-red rounded-pill fw-bold">Lihat Keranjang</a>
                            <button type="button" class="btn btn-gray-red rounded-pill fw-bold" data-bs-dismiss="modal">Lanjut Belanja</button>

                        @elseif($actionType == 'reservation')
                            <a href="{{ route('profile.history') }}" class="btn btn-makku-red rounded-pill fw-bold">Cek Riwayat</a>
                            <button type="button" class="btn btn-gray-red rounded-pill fw-bold" data-bs-dismiss="modal">Tutup</button>

                        @elseif($actionType == 'profile')
                            <a href="{{ route('profile.show') }}" class="btn btn-makku-red rounded-pill fw-bold">
                                Lihat Profil
                            </a>
                            <button type="button" class="btn btn-gray-red rounded-pill fw-bold" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            
                        @else
                            <a href="{{ route('menu.index') }}" class="btn btn-makku-red rounded-pill fw-bold">Pesan Lagi</a>
                            <button type="button" class="btn btn-gray-red rounded-pill fw-bold" data-bs-dismiss="modal">Tutup</button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>