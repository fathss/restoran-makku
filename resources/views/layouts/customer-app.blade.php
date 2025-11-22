@extends('layouts.master')

{{-- Title (opsional) --}}
{{-- @section('title', 'Customer Application') --}}

{{-- Body Class --}}
@section('body_class', 'normal-body')

{{-- Body --}}
@section('body')
    @include('partials.customer.navbar') 

    @yield('content')

    
    {{-- @include('partials.customer.footer') --}}
@endsection