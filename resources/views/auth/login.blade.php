<x-guest-layout>
    
    <div class="text-center mb-5">
        <h3 class="fw-bold mb-2" style="color: #333;">Masuk</h3>
        <p class="text-muted" style="font-size: 0.95rem;">
            Belum punya akun Makku? 
            <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #0056b3;">
                Daftar
            </a>
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   placeholder="Contoh: user@email.com" 
                   :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                
                <input id="password" type="password" name="password" 
                       class="form-control border-end-0 @error('password') is-invalid @enderror" 
                       placeholder="Masukkan password" 
                       required autocomplete="current-password">
                
                <span class="input-group-text bg-white border-start-0 text-muted @error('password') border-red @enderror" 
                      id="togglePassword" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                    <i class="far fa-eye-slash" id="eyeIcon"></i>
                </span>

            </div>
            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-muted small">
                    Ingat saya
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <div class="d-grid">
            <button type="submit" class="btn-makku-red">
                Masuk Sekarang
            </button>
        </div>

    </form>

</x-guest-layout>