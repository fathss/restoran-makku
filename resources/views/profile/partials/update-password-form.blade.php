<section>
    <header class="mb-4">
        <p class="text-muted mb-0">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('user-password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label fw-bold">Password Saat Ini</label>
            <input id="current_password" name="current_password" type="password" 
                   class="form-control p-2 @error('current_password') is-invalid @enderror" 
                   autocomplete="current-password">
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password Baru</label>
            <input id="password" name="password" type="password" 
                   class="form-control p-2 @error('password') is-invalid @enderror" 
                   autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" 
                   class="form-control p-2 @error('password_confirmation') is-invalid @enderror" 
                   autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-makku-red rounded-pill px-4 py-2 fw-bold">Simpan Password</button>
        </div>
    </form>
</section>