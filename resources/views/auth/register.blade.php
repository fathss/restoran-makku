<x-guest-layout>

    <div class="text-center mb-5">
        <h3 class="fw-bold mb-2" style="color: #333;">Daftar Akun</h3>
        <p class="text-muted" style="font-size: 0.95rem;">
            Sudah punya akun Makku? 
            <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #0056b3;">
                Masuk
            </a>
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" 
                   placeholder="Masukkan nama Anda" 
                   :value="old('name')" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="text-danger small mt-1" />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" 
                   placeholder="Contoh: user@email.com" 
                   :value="old('email')" required>
            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                
                <input id="password" class="form-control border-end-0 @error('password') is-invalid @enderror" 
                       type="password" name="password" 
                       placeholder="Minimal 8 karakter" 
                       required autocomplete="new-password">
                
                <span class="input-group-text bg-white border-start-0 text-muted @error('password') border-red @enderror" 
                      id="togglePassword" 
                      style="cursor: pointer;" 
                      onclick="togglePasswordVisibility()">
                    <i class="far fa-eye-slash" id="eyeIcon"></i>
                </span>

            </div>
            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" class="form-control" type="password" 
                   name="password_confirmation" placeholder="Ulangi password tadi" required>
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-1" />
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn-makku-red">
                Daftar Sekarang
            </button>
        </div>
        
        <div class="text-center mt-3">
            <small class="text-muted" style="font-size: 0.8rem;">
                Dengan mendaftar, Anda menyetujui Syarat & Ketentuan kami.
            </small>
        </div>

    </form>
</x-guest-layout>