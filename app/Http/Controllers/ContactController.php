<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact_us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only([
            'full_name',
            'email',
            'phone',
            'subject',
            'message',
        ]));

        return redirect()->route('contact_us')
            ->with('success', 'Your message has been submitted successfully.');
    }
}
