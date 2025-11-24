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