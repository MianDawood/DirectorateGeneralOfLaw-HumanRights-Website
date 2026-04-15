<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('pages.complaint_cell');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'cnic' => 'required|string|max:20',
            'contact_number' => 'required|string|max:30',
            'district' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'details' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'full_name',
            'cnic',
            'contact_number',
            'district',
            'category',
            'details',
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('complaints', 'public');
        }

        Complaint::create($data);

        return redirect()->route('complaint_cell')
            ->with('success', 'Your complaint has been submitted successfully.');
    }
}
