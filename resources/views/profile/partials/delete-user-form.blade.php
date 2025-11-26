<section class="mb-4">
    <header>
        <p class="text-muted mb-4">
            Setelah akun Anda dihapus, semua data akan hilang secara permanen.
        </p>
    </header>

    <button type="button" 
            class="btn btn-danger rounded-pill px-4 py-2 font-weight-bold" 
            data-toggle="modal" 
            data-target="#confirmUserDeletionModal">
        Hapus Akun
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')
                    
                    <h2 class="h5 font-weight-bold text-danger mb-3">
                        Apakah Anda yakin ingin menghapus akun?
                    </h2>

                    <p class="text-muted mb-4">
                        Harap masukkan kata sandi Anda untuk mengkonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
                    </p>

                    <div class="form-group mb-3">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input id="password" name="password" type="password" 
                               class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                               placeholder="Masukkan password Anda"
                               required>
                        
                        @error('password', 'userDeletion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary rounded-pill mr-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-pill">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>