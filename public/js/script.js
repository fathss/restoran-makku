function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput && eyeIcon) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
}

// --- LOGIKA UNTUK MODAL SUKSES OTOMATIS (DENGAN LOG) ---
document.addEventListener("DOMContentLoaded", function() {
    console.log("1. Script.js berhasil dimuat!"); // Cek 1

    const successModalEl = document.getElementById('successModal');
    
    if (successModalEl) {
        console.log("2. Modal ditemukan di HTML!"); // Cek 2
        
        // Ambil nilai data-auto-show
        const shouldShow = successModalEl.getAttribute('data-auto-show');
        console.log("3. Status data-auto-show adalah:", shouldShow); // Cek 3

        if (shouldShow === 'true') {
            console.log("4. Mencoba memunculkan modal..."); // Cek 4
            const myModal = new bootstrap.Modal(successModalEl);
            myModal.show();
        } else {
            console.log("4. Modal tidak dimunculkan karena status false.");
        }
    } else {
        console.error("2. ERROR: Modal dengan id 'successModal' TIDAK DITEMUKAN di HTML.");
    }
});