<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        return view('hotel.show', ['hotel' => $hotel]);
    }
}