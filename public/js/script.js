// ==========================================
// SCRIPT UNTUK ADMINLTE (BOOTSTRAP 4 + JQUERY)
// ==========================================

// 1. FUNGSI TOGGLE PASSWORD (Login/Register)
function togglePasswordVisibility() {
    // Kita gunakan jQuery untuk seleksi elemen agar konsisten
    var passwordInput = $('#password');
    var eyeIcon = $('#eyeIcon');

    if (passwordInput.length && eyeIcon.length) {
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    }
}

// 2. FUNGSI MODAL SUKSES OTOMATIS
$(document).ready(function() {
    console.log("Script AdminLTE Loaded!");

    var modal = $('#successModal');

    // Cek apakah modal ada di halaman
    if (modal.length) {
        var autoShow = modal.attr('data-auto-show');
        console.log("Status Auto Show:", autoShow);

        // Cek apakah nilainya 'true'
        if (autoShow === 'true') {
            console.log("Menampilkan Modal...");
            modal.modal('show'); // Syntax Bootstrap 4
        }
    }
});