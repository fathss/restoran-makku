<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; 
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create()
    {
        return view('customer.reservation');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'amount_people' => 'required|integer|min:1',
                'reservation_time' => 'required|date|after:now',
                'table_number' => 'nullable|integer|min:1|max:20',
            ]);

            Reservation::create([
                'user_id' => Auth::id(),
                'table_number' => $request->table_number ?? rand(1, 20),
                'amount_people' => $request->amount_people,
                'reservation_time' => $request->reservation_time,
                'status' => 'pending'
            ]);

            return redirect()->route('home')
                ->with('success', 'Reservasi berhasil dibuat! Silakan datang tepat waktu.')
                ->with('type', 'reservation');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('modal_error', 'Reservasi gagal dibuat. Silakan coba lagi.')
                ->withInput();
        }
    }
}