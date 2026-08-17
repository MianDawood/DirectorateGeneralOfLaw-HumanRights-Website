<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoNotice;
use Illuminate\Http\Request;


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
            'image' => 'nullable|file|max:2048',
            'is_public_notice' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description']);
        $data['is_public_notice'] = $request->has('is_public_notice');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/notices'), $filename);
            $data['image'] = 'notices/' . $filename;
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
            'image' => 'nullable|file|max:2048',
            'is_public_notice' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description']);
        $data['is_public_notice'] = $request->has('is_public_notice');

        if ($request->hasFile('image')) {
            if ($ngoNotice->image && storage_exists($ngoNotice->image)) {
                storage_delete($ngoNotice->image);
            }
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/notices'), $filename);
            $data['image'] = 'notices/' . $filename;
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
        if ($ngoNotice->image && storage_exists($ngoNotice->image)) {
            storage_delete($ngoNotice->image);
        }

        $ngoNotice->delete();

        return redirect()->route('admin.ngo-notices.index')
            ->with('success', 'NGO Notice deleted successfully.');
    }
}
