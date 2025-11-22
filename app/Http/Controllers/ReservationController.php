<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // Panggil Model
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create()
    {
        return view('customer.reservation');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'amount_people' => 'required|integer|min:1',
            'reservation_time' => 'required|date|after:now', // Waktu harus masa depan
        ]);

        // 2. Simpan ke Database
        Reservation::create([
            'user_id' => Auth::id(),
            'table_number' => $request->table_number ?? rand(1, 20), // Kalau kosong, acak meja 1-20
            'amount_people' => $request->amount_people,
            'reservation_time' => $request->reservation_time,
            'status' => 'pending'
        ]);

        // 3. Redirect ke Home dengan Pesan Sukses
        return redirect()->route('home')
            ->with('success', 'Reservasi berhasil dibuat! Silakan datang tepat waktu.')
            ->with('type', 'reservation');
    }
}