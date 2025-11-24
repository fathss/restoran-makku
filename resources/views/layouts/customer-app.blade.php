@extends('layouts.master')

@section('body_class', 'normal-body')

@section('body')
    @include('partials.customer.navbar') 

    @yield('content')

@endsection