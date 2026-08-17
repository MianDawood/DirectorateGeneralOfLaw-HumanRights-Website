<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficialMessage;
use Illuminate\Http\Request;


class OfficialMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = OfficialMessage::ordered()->paginate(10);

        return view('pages.dashboard.official-messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.official-messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|file|max:2048',
            'statement' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'position', 'statement', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/images'), $filename);
            $data['image_path'] = 'images/' . $filename;
        }

        OfficialMessage::create($data);

        return redirect()->route('admin.official-messages.index')
            ->with('success', 'Official message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficialMessage $officialMessage)
    {
        return view('pages.dashboard.official-messages.show', compact('officialMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficialMessage $officialMessage)
    {
        return view('pages.dashboard.official-messages.edit', compact('officialMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfficialMessage $officialMessage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|file|max:2048',
            'statement' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'position', 'statement', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($officialMessage->image_path && storage_exists($officialMessage->image_path)) {
                storage_delete($officialMessage->image_path);
            }
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/images'), $filename);
            $data['image_path'] = 'images/' . $filename;
        }

        $officialMessage->update($data);

        return redirect()->route('admin.official-messages.index')
            ->with('success', 'Official message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficialMessage $officialMessage)
    {
        if ($officialMessage->image_path && storage_exists($officialMessage->image_path)) {
            storage_delete($officialMessage->image_path);
        }

        $officialMessage->delete();

        return redirect()->route('admin.official-messages.index')
            ->with('success', 'Official message deleted successfully.');
    }
}
