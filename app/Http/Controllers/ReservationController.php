<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // $reservations = Booking::with('hotel', 'user')->get();
        // return view('dashboard.reservations.index', compact('reservations'));
        return view('dashboard.reservations.index');
    }

    public function show(Booking $reservation)
    {
        return view('dashboard.reservations.show', compact('reservation'));
    }

    public function create(Hotel $hotel)
    {
        $users = User::all();
        return view('dashboard.reservations.create', compact('hotel', 'users'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        Booking::create([
            'hotel_id' => $hotel->id,
            'user_id' => $request->input('user_id'),
            'room_id' => $request->input('room_id'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
        ]);

        return redirect()->route('dashboard.reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function destroy(Booking $reservation)
    {
        $reservation->delete();
        return redirect()->route('dashboard.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
