<section>
    <header class="mb-4">
        <p class="text-muted mb-0">
            Perbarui informasi profil dan alamat email akun Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input id="name" name="name" type="text" 
                   class="form-control p-2 @error('name') is-invalid @enderror" 
                   value="{{ old('name', $user->name) }}" 
                   required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-bold">Nomor Telepon</label>
            <input id="phone" name="phone" type="text"
                   class="form-control p-2 @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $user->phone) }}"
                   autocomplete="tel">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-bold">Alamat Lengkap</label>
            <textarea id="address" name="address" rows="3"
                      class="form-control p-2 @error('address') is-invalid @enderror"
                      autocomplete="street-address">{{ old('address', $user->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-makku-red rounded-pill px-4 py-2 fw-bold">Simpan</button>
        </div>
    </form>
</section>