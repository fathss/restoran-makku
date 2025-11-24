<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="bi bi-person-circle mr-2"></i>
        {{ Auth::user()->name }}
        <i class="fas fa-caret-down ml-1"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <i class="bi bi-person mr-2"></i> Profile
        </a>

        <div class="dropdown-divider"></div>

        <a href="{{ route('logout') }}" class="dropdown-item text-danger"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->