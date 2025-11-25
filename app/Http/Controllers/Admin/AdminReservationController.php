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

        $filter = function ($status) use ($search) {
            return Reservation::with('user')
                ->where('status', $status)
                ->when($search, function ($q) use ($search) {
                    $q->whereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%");
                    });
                })
                ->get();
        };

        return view('admin.reservations.index', [
            'pendingReservations'   => $filter(Reservation::STATUS_PENDING),
            'completedReservations' => $filter(Reservation::STATUS_COMPLETED),
            'canceledReservations'  => $filter(Reservation::STATUS_CANCELED),
        ]);
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = Reservation::STATUS_COMPLETED;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservasi berhasil disetujui!');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = Reservation::STATUS_CANCELED;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservasi berhasil dibatalkan!');
    }
}
