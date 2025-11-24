<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * * Tambahkan logika agar user yang sudah login tidak melihat halaman login lagi.
     */
    public function create(): View|\Illuminate\Http\RedirectResponse // Tambahkan tipe RedirectResponse
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
             $user = Auth::user();
             if ($user->role === 'admin' || $user->role === 'employee') {
                 return redirect()->intended(route('admin.dashboard'));
             }
             return redirect()->intended(route('home'));
        }

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Proses Autentikasi
        $request->authenticate();

        // 2. Buat Sesi Login
        $request->session()->regenerate();

        // 3. LOGIKA PEMISAH ROLE (INI PERUBAHAN UTAMANYA)
        $user = $request->user();

        // Jika Admin atau Employee -> Ke Dashboard Admin
        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->intended(route('admin.index'));
        }

        // Jika Customer (default) -> Ke Halaman Utama
        return redirect()->intended(route('home'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}