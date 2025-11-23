@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Tambah Menu Baru')

{{-- Main Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Tambah Menu Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                        @include('partials.admin.menus.__form', ['menu' => null])
                        
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-danger px-5">
                                <i class="bi bi-check-circle"></i> Simpan
                            </button>
                            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary px-5">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
