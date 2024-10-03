<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index($name)
    {
        dd($name);
        return view("home");
    }
}
