<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::with('user', 'hotel')->get();
        return view('dashboard.reservations.index', compact('reservations'));
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

    public function booked()
    {
        $user = Auth::user();

        $reservations = Booking::where('user_id', $user->id)->with('hotel')->get();

        return view('reservations.index', compact('reservations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'guests' => 'required|integer|min:1',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        Booking::create([
            'hotel_id' => $request->input('hotel_id'),
            'user_id' => Auth::id(),
            'check_in' => $request->input('checkin'),
            'check_out' => $request->input('checkout'),
        ]);

        return redirect()->route('dashboard.reservations.index')->with('success', 'Reservation created successfully.');
    }


    public function destroy(Booking $reservation)
    {
        $reservation->delete();
        return redirect()->route('dashboard.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
