<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Makku - Restoran Enak</title>

  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

  @include('partials.customer.navbar')

  <div class="content-wrapper" >
    <div class="content pt-0">
        @yield('content')
    </div>
  </div>

  @include('partials.customer.footer')

</div>

@include('partials.customer.modals')

@include('partials.customer.scripts')

</body>
</html>