<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Reservation::with('user')
            ->where('status', Reservation::STATUS_PENDING);

        // Filter pencarian
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $reservations = $query->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = Reservation::STATUS_COMPLETED;
        $reservation->save();

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservasi berhasil disetujui!');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = Reservation::STATUS_CANCELED;
        $reservation->save();

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservasi berhasil dibatalkan!');
    }
}
