<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="./index.html" class="brand-link">
      <span class="brand-text fw-bold fs-5">ADMIN</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link active bg-primary p-3">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-header fw-light">MANAJEMEN PELANGGAN</li>
        <li class="nav-item">
          <a href="{{ route('admin.menus.index') }}" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>Menu</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Transaksi
                @if ($totalTransactions > 0)
                  <span class="nav-badge badge text-bg-danger me-3">
                    {{ $totalTransactions ?? 0 }}
                  </span>
                @endif
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list-check"></i>
                <p>
                  Pesanan
                  @if ($totalOrders > 0)
                    <span class="nav-badge badge text-bg-danger">
                      {{ $totalOrders ?? 0 }}
                    </span>
                  @endif
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.reservations.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                  Reservasi
                  @if ($totalReservations > 0)
                    <span class="nav-badge badge text-bg-danger">
                      {{ $totalReservations ?? 0 }}
                    </span>
                  @endif
                </p>
              </a>
            </li>
          </ul>
        </li>
        </li>
      </ul>
    </nav>
  </div>
</aside>
