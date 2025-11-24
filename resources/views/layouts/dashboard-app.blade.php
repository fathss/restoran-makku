@extends('layouts.master')

@section('body')
    <div class="app-wrapper">
        @include('partials.admin.navbar')

        @include('partials.admin.sidebar')

        <div class="app-main">
            <div class="app-content">
                <div class="container-fluid mt-4">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials.admin.footer')
    </div>
@endsection