<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessagesController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query()->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $messages = $query->paginate(15)->withQueryString();

        return view('pages.dashboard.contact-messages.index', compact('messages'));
    }

    public function create()
    {
        return view('pages.dashboard.contact-messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
            'status' => 'required|string|max:20',
        ]);

        ContactMessage::create($request->only([
            'full_name',
            'email',
            'phone',
            'subject',
            'message',
            'status',
        ]));

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message created successfully.');
    }

    public function show(ContactMessage $contact_message)
    {
        return view('pages.dashboard.contact-messages.show', ['message' => $contact_message]);
    }

    public function edit(ContactMessage $contact_message)
    {
        return view('pages.dashboard.contact-messages.edit', ['message' => $contact_message]);
    }

    public function update(Request $request, ContactMessage $contact_message)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
            'status' => 'required|string|max:20',
        ]);

        $contact_message->update($request->only([
            'full_name',
            'email',
            'phone',
            'subject',
            'message',
            'status',
        ]));

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message updated successfully.');
    }

    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
