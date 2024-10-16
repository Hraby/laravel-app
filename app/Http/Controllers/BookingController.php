<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $customer = Customer::firstOrCreate(
            ['email' => $request->input('email')],
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
            ]
        );

        $room = Room::findOrFail($request->input('room_id'));

        $booking = Booking::create([
            'room_id' => $room->id,
            'customer_id' => $customer->id,
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'guests' => $request->input('guests'),
            'price' => $request->input('price'),
        ]);

        return response()->json(['message' => 'Rezervace byla úspěšně vytvořena!', 'booking' => $booking]);
    }
}
