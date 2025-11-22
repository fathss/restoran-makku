<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    //menampilkan profil user
    public function show(Request $request): View
    {
        return view('customer.profile', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')
            ->with('success', 'Informasi profil berhasil diperbarui.')
            ->with('type', 'profile');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        // 1. Definisikan validasi input
        $rules = [
            'current_password' => ['required', 'current_password'], // Cek harus cocok dengan password lama
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()], // Password baru harus kuat dan cocok
        ];

        try {
            // 2. Jalankan Validasi
            $validated = $request->validate($rules);
            
            // 3. Update Password jika validasi lolos
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            // 4. Redirect Sukses (ke Modal Sukses Global)
            return Redirect::route('profile.edit')->with('success', 'Password berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // 5. Tangkap error validasi
            
            // Ambil pesan error pertama
            $firstErrorMessage = $e->validator->errors()->first();

            // Kirim pesan ke modal_error untuk ditampilkan sebagai Pop-up Gagal
            return Redirect::route('profile.edit')
                           ->with('modal_error', $firstErrorMessage)
                           ->withErrors($e->validator); // Kirim errors bag agar input field tetap merah
        }
    }

    /**
     * Delete the user's account.
     */
public function destroy(Request $request): RedirectResponse
    {
        // 1. Validasi Password (Kita gunakan logika Auth::guard untuk mengecek)
        if (! Auth::guard('web')->validate(['email' => $request->user()->email, 'password' => $request->password])) {
            
            // Jika password salah, kirim pesan error ke modal, lalu redirect kembali ke halaman edit
            return Redirect::route('profile.edit')
                           ->with('modal_error', 'Password yang Anda masukkan salah. Silakan coba lagi.');
        }

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function history()
    {
        $userId = Auth::id();
        
        // Ambil riwayat order (pesanan) dari yang terbaru
        $orders = \App\Models\Order::where('user_id', $userId)->with('details.menu')->latest()->get();

        // Ambil riwayat reservasi
        $reservations = \App\Models\Reservation::where('user_id', $userId)->latest()->get();

        return view('customer.history', compact('orders', 'reservations'));
    }
}
