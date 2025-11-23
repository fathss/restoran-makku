<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <a href="./index.html" class="brand-link">
      {{-- <img src="./assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" /> --}}
      <span class="brand-logo">Admin</span>
    </a>
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
        <li class="nav-item">
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
        </li>
        {{-- Menu --}}
        <li class="nav-item">
          <a href="{{ route('admin.menus.index') }}" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>Menu</p>
          </a>
        </li>

        {{-- Transaksi --}}
        <li class="nav-item">
          <button type="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Transaksi 
                <span class="nav-badge badge text-bg-danger me-3">5</span>
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
          </button>
          <ul class="nav nav-treeview">
            {{-- Pesanan --}}
            <li class="nav-item">
              <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list-check"></i>
                <p>
                  Pesanan
                  <span class="nav-badge badge text-bg-danger">3</span>
                </p>
              </a>
            </li>
            {{-- Reservasi --}}
            <li class="nav-item">
              <a href="{{ route('admin.reservations.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                  Reservasi
                  <span class="nav-badge badge text-bg-danger">2</span>
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
