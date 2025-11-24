<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link text-center">
    <span class="brand-text font-weight-bold">ADMIN PAGE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center">
      <div class="info">
        <a href="#" class="d-block">
          <i class="bi bi-person-circle" style="font-size: 2rem;"></i><br>
          {{ Auth::user()->name }}
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-2">
          <a href="{{ route('admin.index') }}" class="nav-link active bg-danger p-3">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">MANAJEMEN PELANGGAN</li>
        <li class="nav-item">
          <a href="{{ route('admin.menus.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Menu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-receipt"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>
              @if ($totalPendings > 0)
                <span class="badge badge-warning right">
                  {{ $totalPendings ?? 0}}
                </span>
              @endif
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan</p>
                @if ($totalPendingOrders > 0)
                  <span class="badge badge-warning right">
                    {{ $totalPendingOrders ?? 0}}
                  </span>
                @endif
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.reservations.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reservasi</p>
                @if ($totalPendingReservations > 0)
                  <span class="badge badge-warning right">
                    {{ $totalPendingReservations ?? 0}}
                @endif
                </span>
              </a>
          </ul>
        </li>
        <li class="nav-header">LAINNYA</li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-right-from-bracket"></i>
                <p>Logout</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>