<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveHotelRequest;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class ReserveHotelController extends Controller
{
    public function reserveForm(Hotel $hotel)
    {
        $users = User::all();
        return view("reserverForm", compact("hotel", "users"));
    }

    public function reserveTable(ReserveHotelRequest $request, Hotel $hotel)
    {
        $customer = User::find($request->validate("customer"));
        
    }
}
