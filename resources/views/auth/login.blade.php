<x-guest-layout>
    <div class="card card-outline card-danger">
        <div class="card-header text-center">
            <a href="{{ route('home') }}" class="h1" style="font-family: 'Dancing Script'; color: #ff3b30;"><b>Makku</b>.</a>
        </div>
        
        <div class="card-body">
            <p class="login-box-msg">Silakan masuk untuk melanjutkan</p>

            <x-auth-session-status class="mb-3 text-danger text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                            <span class="fas fa-eye-slash" id="eyeIcon"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-danger">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger btn-block">Masuk</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="{{ route('register') }}" class="btn btn-block btn-outline-danger">
                    Belum punya akun? Daftar
                </a>
            </div>
            
            @if (Route::has('password.request'))
                <p class="mb-1 text-center">
                    <a href="{{ route('password.request') }}" class="text-muted">Lupa password saya</a>
                </p>
            @endif
        </div>
    </div>
</x-guest-layout>