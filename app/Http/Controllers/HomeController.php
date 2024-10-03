<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(5);

        return view('index', compact('hotels'));
    }
}
