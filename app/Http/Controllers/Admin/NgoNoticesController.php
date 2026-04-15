<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NgoNoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = NgoNotice::orderBy('created_at', 'desc')->paginate(15);
        return view('pages.dashboard.ngo-notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.ngo-notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public_notice' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description']);
        $data['is_public_notice'] = $request->has('is_public_notice');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('notices', 'public');
        }

        NgoNotice::create($data);

        return redirect()->route('admin.ngo-notices.index')
            ->with('success', 'NGO Notice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NgoNotice $ngoNotice)
    {
        return view('pages.dashboard.ngo-notices.show', compact('ngoNotice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NgoNotice $ngoNotice)
    {
        return view('pages.dashboard.ngo-notices.edit', compact('ngoNotice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NgoNotice $ngoNotice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public_notice' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description']);
        $data['is_public_notice'] = $request->has('is_public_notice');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ngoNotice->image && Storage::disk('public')->exists($ngoNotice->image)) {
                Storage::disk('public')->delete($ngoNotice->image);
            }
            $data['image'] = $request->file('image')->store('notices', 'public');
        }

        $ngoNotice->update($data);

        return redirect()->route('admin.ngo-notices.index')
            ->with('success', 'NGO Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NgoNotice $ngoNotice)
    {
        if ($ngoNotice->image && Storage::disk('public')->exists($ngoNotice->image)) {
            Storage::disk('public')->delete($ngoNotice->image);
        }

        $ngoNotice->delete();

        return redirect()->route('admin.ngo-notices.index')
            ->with('success', 'NGO Notice deleted successfully.');
    }
}
