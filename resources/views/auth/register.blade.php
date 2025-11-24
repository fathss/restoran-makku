<x-guest-layout>
    <div class="card card-outline card-danger">
        <div class="card-header text-center">
            <a href="{{ route('home') }}" class="h1" style="font-family: 'Dancing Script'; color: #ff3b30;"><b>Makku</b>.</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Daftar keanggotaan baru</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
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
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                            <span class="fas fa-eye-slash" id="eyeIcon"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-block">Daftar Sekarang</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center mt-3">
                <a href="{{ route('login') }}" class="text-center text-danger font-weight-bold">Saya sudah punya akun</a>
            </div>
        </div>
    </div>
</x-guest-layout>