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

        if (!$user) {
            return view('reservations.index');
        }

        $reservations = Booking::where('user_id', $user->id)->with('hotel')->get();

        return view('reservations.index', compact('reservations', 'user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        Booking::create([
            'hotel_id' => $request->input('hotel_id'),
            'user_id' => Auth::id(),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'guests' => $request->input('guests'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('reservation.index');
    }


    public function destroy(Booking $reservation)
    {
        $reservation->delete();
        return redirect()->route('dashboard.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
