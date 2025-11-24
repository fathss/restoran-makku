@extends('layouts.master')

@section('body')
    <div class="wrapper">
        @include('partials.admin.navbar')

        @include('partials.admin.sidebar')

        <section class="content-wrapper">
            <div class="content">
                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </div>
        </section>

        @include('partials.admin.footer')
    </div>
@endsection