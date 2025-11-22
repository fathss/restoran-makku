<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE-4.0.0-rc4/src/html/public/css/adminlte.css') }}">
    <!-- Third-party CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous">

    @stack('styles')

    {{-- Title --}}
    <title>@yield('title', 'Page Title')</title>
</head>
<body class="@yield('body_class', 'layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary')">
    {{-- Body --}}
    @yield('body')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/AdminLTE-4.0.0-rc4/src/html/public/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" crossorigin="anonymous"></script>

    @stack('scripts')
</body>
</html>