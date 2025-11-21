@extends('layouts.master')

{{-- Title (opsional) --}}
{{-- @section('title', 'Dashboard Application') --}}

{{-- Body --}}
@section('body')
    <div class="app-wrapper">
        @include('partials.admin.navbar')

        @include('partials.admin.sidebar')

        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        @include('partials.admin.footer')
    </div>
@endsection