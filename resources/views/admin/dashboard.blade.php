@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard Admin</h1>
@stop

@section('content')
    <div class="row">
        {{-- Kotak 1: Total Pesanan (Warna Biru) --}}
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Pesanan Baru</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- Kotak 2: Total Penghasilan (Warna Hijau) --}}
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Rp 5Jt</h3>
                    <p>Pemasukan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Laporan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        {{-- Kotak 3: Menu (Warna Kuning) --}}
        <div class="col-lg-4 col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Info Server</h3>
                </div>
                <div class="card-body">
                    Sistem berjalan lancar.
                </div>
            </div>
        </div>
    </div>
@stop