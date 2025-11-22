@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">Keranjang Belanja</h2>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
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
                                        <img src="{{ $details['image'] ? asset($details['image']) : 'https://placehold.co/50' }}" 
                                             alt="{{ $details['name'] }}" 
                                             class="rounded me-3" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0 fw-bold">{{ $details['name'] }}</h6>
                                        </div>
                                    </div>
                                </td>
                                
                                <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('patch') <input type="hidden" name="id" value="{{ $id }}">
                                        
                                        <input type="number" 
                                            name="quantity" 
                                            value="{{ $details['quantity'] }}" 
                                            class="form-control text-center" 
                                            style="width: 70px;" 
                                            min="1"
                                            onchange="this.form.submit()"> </form>
                                </td>
                                
                                <td class="fw-bold text-danger">
                                    Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                                </td>
                                
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
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
        <div class="card-footer bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('menu.index') }}" class="btn btn-gray-red rounded-pill px-4 fw-bold">
                    <i class="fas fa-arrow-left me-2"></i> Lanjut Belanja
                </a>
                
                <div class="text-end">
                    <h4 class="fw-bold mb-2">Total: <span class="text-danger">Rp {{ number_format($total, 0, ',', '.') }}</span></h4>
                    
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger fw-bold rounded-pill px-5 py-2">
                            Checkout Sekarang
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection