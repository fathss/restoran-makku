@extends('layouts.main')

@section('content')
<div class="row pt-3">
    <div class="col-12">
        
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-shopping-cart mr-1"></i> Keranjang Belanja
                </h3>
            </div>

            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 40%">Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            {{-- LOGIC PERBAIKAN: Cek apakah gambar array atau string --}}
                                            @php
                                                $imgCart = $details['image'] ?? null;
                                                
                                                // Jika array, ambil gambar pertama (index 0)
                                                if (is_array($imgCart) && count($imgCart) > 0) {
                                                    $imgCart = $imgCart[0];
                                                }
                                            @endphp

                                            {{-- TAMPILKAN GAMBAR --}}
                                            <img src="{{ $imgCart ? asset($imgCart) : 'https://placehold.co/50' }}" 
                                                class="img-circle elevation-1 mr-3" 
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                
                                            <div>
                                                <h6 class="mb-0 font-weight-bold">{{ $details['name'] }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                    
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="{{ $details['quantity'] }}" 
                                                   class="form-control form-control-sm text-center" 
                                                   style="width: 60px;" 
                                                   min="1"
                                                   onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    
                                    <td class="text-danger font-weight-bold">
                                        Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                                    </td>
                                    
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-shopping-basket fa-3x mb-3"></i>
                                    <p>Keranjang masih kosong.</p>
                                    <a href="{{ route('menu.index') }}" class="btn btn-danger btn-sm rounded-pill px-4">Belanja Sekarang</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(session('cart'))
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <div class="pr-5 w-100 mb-3 mt-3">
                            <h5 class="font-weight-bold mb-2">Total: <span class="text-danger pr-4">Rp {{ number_format($total, 0, ',', '.') }}</span></h5>
                        </div>

                        <a href="{{ route('menu.index') }}" class="btn btn-default rounded-pill font-weight-bold">
                            <i class="fas fa-arrow-left mr-1"></i> Lanjut Belanja
                        </a>
                    </div>
                    
                    
                    
                    <div class="text-right d-flex flex-column">

                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <select name="order_type" class="form-control w-90 btn btn-danger font-weight-bold rounded-pill px-4" required>
                                    <option value="" disabled selected>-Pilih Metode Pesanan-</option>
                                    <option value="dine_in">Dine In</option>
                                    <option value="takeaway">Take Away</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-danger font-weight-bold rounded-pill px-5">
                                Checkout Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection