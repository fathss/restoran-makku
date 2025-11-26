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
        $rules = [
            'current_password' => ['required', 'current_password'], 
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()], 
        ];

        try {
            $validated = $request->validate($rules);
            
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            return Redirect::route('profile.edit')->with('success', 'Password berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstErrorMessage = $e->validator->errors()->first();

            return Redirect::route('profile.edit')
                           ->with('modal_error', $firstErrorMessage)
                           ->withErrors($e->validator);
        }
    }

public function destroy(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate(['email' => $request->user()->email, 'password' => $request->password])) {
            
            return Redirect::route('profile.edit')
                           ->with('modal_error', 'Password yang Anda masukkan salah. Silakan coba lagi.');
        }

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')
            ->with('success', 'Akun Anda berhasil dihapus.')
            ->with('type', 'delete_account');
    }

    public function history()
    {
        $userId = Auth::id();
        
        $orders = \App\Models\Order::where('user_id', $userId)->with('details.menu')->latest()->get();

        $reservations = \App\Models\Reservation::where('user_id', $userId)->latest()->get();

        return view('customer.history', compact('orders', 'reservations'));
    }
}
