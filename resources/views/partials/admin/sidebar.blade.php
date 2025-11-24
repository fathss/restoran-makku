<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <a href="./index.html" class="brand-link">
      {{-- <img src="./assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" /> --}}
      <span class="brand-text fw-bold fs-5">ADMIN</span>
    </a>
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard <i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="./index.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Dashboard v1</p></a></li>
            <li class="nav-item"><a href="./index2.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Dashboard v2</p></a></li>
            <li class="nav-item"><a href="./index3.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Dashboard v3</p></a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="./generate/theme.html" class="nav-link"><i class="nav-icon bi bi-palette"></i><p>Theme Generate</p></a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-seam-fill"></i><p>Widgets <i class="nav-arrow bi bi-chevron-right"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="./widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Small Box</p></a></li>
            <li class="nav-item"><a href="./widgets/info-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>info Box</p></a></li>
            <li class="nav-item"><a href="./widgets/cards.html" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Cards</p></a></li>
          </ul>
        </li> --}}
        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link active bg-primary p-3">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-header fw-light">MANAJEMEN PELANGGAN</li>
        {{-- Menu --}}
        <li class="nav-item">
          <a href="{{ route('admin.menus.index') }}" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>Menu</p>
          </a>
        </li>

        {{-- Transaksi --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Transaksi 
                <span class="nav-badge badge text-bg-danger me-3">
                  {{ $totalTransactions ?? 0 }}
                </span>
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- Pesanan --}}
            <li class="nav-item">
              <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list-check"></i>
                <p>
                  Pesanan
                  <span class="nav-badge badge text-bg-danger">
                    {{ $totalOrders ?? 0 }}
                  </span>
                </p>
              </a>
            </li>
            {{-- Reservasi --}}
            <li class="nav-item">
              <a href="{{ route('admin.reservations.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                  Reservasi
                  <span class="nav-badge badge text-bg-danger">
                    {{ $totalReservations ?? 0 }}
                  </span>
                </p>
              </a>
            </li>
          </ul>
        </li>
        </li>
        <!-- add more items as needed -->
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
