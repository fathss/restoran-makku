@extends('layouts.master')

@section('body')
    <div class="wrapper">
        @include('partials.admin.navbar')

        @include('partials.admin.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('partials.admin.footer')
    </div>
@endsection