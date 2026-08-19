<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = \App\Models\SiteSetting::getSettings();

        return view('pages.contact_us', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:100',
            'message' => 'nullable|string',
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

    public function newsletter(Request $request)
    {
        $request->validate([
            'full_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        NewsletterSubscription::updateOrCreate(
            ['email' => $request->input('email')],
            [
                'full_name' => $request->input('full_name'),
                'phone' => $request->input('phone'),
            ]
        );

        return back()->with('success', 'Thank you for subscribing to our newsletter.');
    }
}
