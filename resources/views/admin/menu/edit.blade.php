@extends('layouts.dashboard-app')

{{-- Title --}}
@section('title', 'Edit Menu')

{{-- Main Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Edit Menu: {{ $menu->menu_name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menus.update', $menu->menu_id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('partials.admin.menus.__form', ['menu' => $menu])

                        {{-- Button group Bootstrap 4 --}}
                        <div class="d-flex mt-4">
                            <button type="submit" class="btn btn-success px-5 mr-2">
                                <i class="fa fa-check-circle"></i> Simpan Perubahan
                            </button>

                            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary px-5 mr-2">
                                <i class="fa fa-times-circle"></i> Batal
                            </a>

                            <button type="button" class="btn btn-outline-danger px-5 ml-auto"
                                data-toggle="modal" data-target="#deleteModal{{ $menu->menu_id }}">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.admin.menus.delete-confirm-modal', ['menu' => $menu])
@endsection
