<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        // Contact::create($request->all());

        // Přesměrování zpět s úspěšnou zprávou
        return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
    }
}
