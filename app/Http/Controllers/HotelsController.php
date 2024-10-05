<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        return view('hotel.show', ['hotel' => $hotel]);
    }

    public function create(): View
    {
        return view("hotel.create");
    }

    public function store(HotelStoreRequest $request): RedirectResponse
    {
        Hotel::create($request->validated());

        return redirect()->route("hotel.index")->with("success", "Hotel created successfully.");
    }

    public function edit(Hotel $hotel): View
    {
        return view('hotel.edit', compact('note'));
    }

    public function update(HotelUpdateRequest $request, Hotel $hotel): RedirectResponse
    {
        $hotel->update($request->validated());
          
        return redirect()->route('hotel.index')
                        ->with('success', 'Hotel updated successfully');
    }

    public function destroy(Hotel $hotel): RedirectResponse
    {
        $hotel->delete();
           
        return redirect()->route('hotel.index')
                        ->with('success', 'Hotel deleted successfully');
    }

    public function index()
    {
        $hotels = Hotel::paginate(5);

        return view('hotel.index', compact('hotels'));
    }

}