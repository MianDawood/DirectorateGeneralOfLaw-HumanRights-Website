<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintsController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::query()->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $complaints = $query->paginate(15)->withQueryString();

        return view('pages.dashboard.complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('pages.dashboard.complaints.create');
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
            'status' => 'required|string|max:20',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'full_name',
            'cnic',
            'contact_number',
            'district',
            'category',
            'details',
            'status',
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('complaints', 'public');
        }

        Complaint::create($data);

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Complaint created successfully.');
    }

    public function show(Complaint $complaint)
    {
        return view('pages.dashboard.complaints.show', compact('complaint'));
    }

    public function edit(Complaint $complaint)
    {
        return view('pages.dashboard.complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'cnic' => 'required|string|max:20',
            'contact_number' => 'required|string|max:30',
            'district' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'details' => 'required|string',
            'status' => 'required|string|max:20',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'full_name',
            'cnic',
            'contact_number',
            'district',
            'category',
            'details',
            'status',
        ]);

        if ($request->hasFile('attachment')) {
            if ($complaint->attachment_path && Storage::disk('public')->exists($complaint->attachment_path)) {
                Storage::disk('public')->delete($complaint->attachment_path);
            }
            $data['attachment_path'] = $request->file('attachment')->store('complaints', 'public');
        }

        $complaint->update($data);

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        if ($complaint->attachment_path && Storage::disk('public')->exists($complaint->attachment_path)) {
            Storage::disk('public')->delete($complaint->attachment_path);
        }

        $complaint->delete();

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Complaint deleted successfully.');
    }
}
