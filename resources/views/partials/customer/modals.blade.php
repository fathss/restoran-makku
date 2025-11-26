<div class="modal fade" id="authModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
            <div class="modal-body text-center p-5">
                <span style="font-family: 'Dancing Script', cursive; font-size: 2.5rem; color: #ff3b30;">Makku.</span>
                <h4 class="font-weight-bold mb-3 mt-2">Selamat Datang!</h4>
                <p class="text-muted mb-4">Silakan masuk ke akun Anda.</p>
                <a href="{{ route('login') }}" class="btn btn-danger btn-block rounded-pill">Masuk ke Akun</a>
                <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block rounded-pill mt-2">Daftar Baru</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" data-auto-show="{{ (session('success') || session('status') || session('modal_error')) ? 'true' : 'false' }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center p-4" style="border-radius: 20px;">
             @php
                if (session()->has('modal_error')) {
                    $actionType = 'fail'; $message = session('modal_error'); 
                } elseif (session('type')) {
                    $actionType = session('type'); $message = session('success'); 
                } elseif (session()->has('status')) {
                    $actionType = 'profile'; $message = session('success');
                } else {
                    $actionType = 'checkout'; $message = session('success');
                }
                $isSuccess = ($actionType != 'fail');
            @endphp
            <div class="modal-body">
                <i class="fas {{ $isSuccess ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}" style="font-size: 4rem;"></i>
                <h4 class="font-weight-bold mt-3 {{ $isSuccess ? '' : 'text-danger' }}">{{ $isSuccess ? 'Berhasil!' : 'Gagal!' }}</h4>
                <p class="text-muted">{{ $message }}</p>
                
                <div class="mt-3">
                    @if($actionType == 'fail')
                        <button class="btn btn-danger btn-block rounded-pill" data-dismiss="modal">Coba Lagi</button>
                    @elseif($actionType == 'cart')
                        <a href="{{ route('cart.index') }}" class="btn btn-danger btn-block rounded-pill">Lihat Keranjang</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Lanjut Belanja</button>
                    @elseif($actionType == 'profile')
                        <a href="{{ route('profile.show') }}" class="btn btn-danger btn-block rounded-pill">Lihat Profil</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @elseif($actionType == 'reservation')
                        <a href="{{ route('profile.history') }}" class="btn btn-danger btn-block rounded-pill">Cek Riwayat</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @elseif($actionType == 'delete_account')
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @else
                        <a href="{{ route('menu.index') }}" class="btn btn-danger btn-block rounded-pill">Pesan Lagi</a>
                        <button class="btn btn-light btn-block rounded-pill mt-2" data-dismiss="modal">Tutup</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>