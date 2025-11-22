<section class="mb-4">
    <header>
        <p class="text-muted mb-4">
            Setelah akun Anda dihapus, semua data akan hilang secara permanen.
        </p>
    </header>

    <button type="button" 
            class="btn btn-danger rounded-pill px-4 py-2 fw-bold" 
            data-bs-toggle="modal" 
            data-bs-target="#confirmUserDeletionModal">
        Hapus Akun
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')
                    
                    <h2 class="h5 fw-bold text-danger mb-3">
                        Apakah Anda yakin ingin menghapus akun?
                    </h2>

                    <p class="text-muted mb-4">
                        Harap masukkan kata sandi Anda untuk mengkonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
                    </p>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input id="password" name="password" type="password" 
                               class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                               placeholder="Masukkan password Anda"
                               required>
                        
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-pill">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>