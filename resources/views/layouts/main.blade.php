<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Makku - Restoran Enak</title>

  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white border-bottom-0 shadow-sm">
    <div class="container-fluid px-4"> <a href="{{ route('home') }}" class="navbar-brand mr-4">
        <span class="brand-text font-weight-bold" style="font-family: 'Dancing Script', cursive; font-size: 2rem; color: #ff3b30;">Makku.</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link font-weight-bold text-danger px-3">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('menu.index') }}" class="nav-link font-weight-bold text-danger px-3">Menu</a>
          </li>
          
          @auth
            <li class="nav-item">
                <a href="{{ route('reservation.create') }}" class="nav-link font-weight-bold text-danger px-3">Reservasi</a>
            </li>
          @else
            <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-danger px-3" data-toggle="modal" data-target="#authModal">Reservasi</a>
            </li>
          @endauth
        </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand mr-auto align-items-center">
          
          <li class="nav-item d-none d-sm-inline-block mr-3">
              <form action="{{ route('menu.index') }}" method="GET" class="form-inline">
                  <div class="input-group input-group-sm" style="border: 1px solid #ddd; border-radius: 20px; overflow: hidden; padding: 2px 10px; width: 250px;"> <input class="form-control form-control-navbar border-0" type="search" name="search" placeholder="Cari..." aria-label="Search" style="background: transparent;">
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit" style="color: #ff3b30;">
                              <i class="fas fa-search" style="background-color: #fff"></i>
                          </button>
                      </div>
                  </div>
              </form>
          </li>

          @auth
              <li class="nav-item mr-3">
                  <a class="nav-link position-relative p-0" href="{{ route('cart.index') }}">
                      <i class="fas fa-shopping-cart fa-lg text-danger"></i>
                      @if(session('cart') && count(session('cart')) > 0)
                          <span class="badge badge-danger navbar-badge" style="right: -5px; top: -5px;">{{ count(session('cart')) }}</span>
                      @endif
                  </a>
              </li>
          @else
              <li class="nav-item mr-3">
                  <a class="nav-link p-0" href="#" data-toggle="modal" data-target="#authModal">
                      <i class="fas fa-shopping-cart fa-lg text-danger"></i>
                  </a>
              </li>
          @endauth

          @auth
              <li class="nav-item dropdown">
                  <a class="nav-link p-0" data-toggle="dropdown" href="#">
                      <i class="fas fa-user-circle fa-2x text-danger"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow-lg">
                      <span class="dropdown-item dropdown-header font-weight-bold">Halo, {{ Auth::user()->name }}</span>
                      <div class="dropdown-divider"></div>
                      <a href="{{ route('profile.show') }}" class="dropdown-item">
                          <i class="fas fa-user mr-2 text-primary"></i> Profil Saya
                      </a>
                      <a href="{{ route('profile.history') }}" class="dropdown-item">
                          <i class="fas fa-history mr-2 text-info"></i> Riwayat Pesanan
                      </a>
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item dropdown-footer text-danger font-weight-bold">
                              <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                          </button>
                      </form>
                  </div>
              </li>
          @else
              <li class="nav-item">
                  <a class="nav-link p-0" href="#" data-toggle="modal" data-target="#authModal">
                      <i class="far fa-user-circle fa-2x text-danger"></i>
                  </a>
              </li>
          @endauth
      </ul>

    </div>
  </nav>

  <div class="content-wrapper" style="background: white;">
    <div class="content pt-0">
        @yield('content')
    </div>
  </div>

  <footer class="main-footer text-center">
    <div class="container">
        <strong>Copyright &copy; 2025 <a href="#" class="text-danger">Makku Resto</a>.</strong> All rights reserved.
    </div>
  </footer>
</div>

<div class="modal fade" id="authModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
            <div class="modal-body text-center p-5">
                <span style="font-family: 'Dancing Script', cursive; font-size: 2.5rem; color: #ff3b30;">Makku.</span>
                <h4 class="font-weight-bold mb-3 mt-2">Selamat Datang!</h4>
                <p class="text-muted mb-4">Silakan masuk ke akun Anda.</p>
                <a href="{{ route('login') }}" class="btn btn-danger btn-block rounded-pill">Masuk ke Akun</a>
                <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block rounded-pill mt-2">Daftar Baru</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" data-auto-show="{{ (session('success') || session('status') || session('modal_error')) ? 'true' : 'false' }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center p-4" style="border-radius: 20px;">
             @php
                $actionType = session('type') ?: (session()->has('status') ? 'profile' : (session()->has('modal_error') ? 'fail' : 'checkout'));
                $isSuccess = ($actionType != 'fail');
                $message = session('success') ?: session('modal_error');
            @endphp
            <div class="modal-body">
                <i class="fas {{ $isSuccess ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}" style="font-size: 4rem;"></i>
                <h4 class="font-weight-bold mt-3 {{ $isSuccess ? '' : 'text-danger' }}">{{ $isSuccess ? 'Berhasil!' : 'Gagal!' }}</h4>
                <p class="text-muted">{{ $message }}</p>
                
                <div class="mt-3">
                    @if($actionType == 'cart')
                        <a href="{{ route('cart.index') }}" class="btn btn-danger btn-block rounded-pill">Lihat Keranjang</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Lanjut Belanja</button>
                    @elseif($actionType == 'fail')
                        <button class="btn btn-danger btn-block rounded-pill" data-dismiss="modal">Coba Lagi</button>
                    @elseif($actionType == 'profile')
                        <a href="{{ route('profile.show') }}" class="btn btn-danger btn-block rounded-pill">Lihat Profil</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @elseif($actionType == 'reservation')
                        <a href="{{ route('profile.history') }}" class="btn btn-danger btn-block rounded-pill">Cek Riwayat</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @else
                        <a href="{{ route('menu.index') }}" class="btn btn-danger btn-block rounded-pill">Pesan Lagi</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

<script>
    $(document).ready(function() {
        var modal = $('#successModal');
        if (modal.attr('data-auto-show') === 'true') {
            modal.modal('show');
        }
    });
</script>

</body>
</html>