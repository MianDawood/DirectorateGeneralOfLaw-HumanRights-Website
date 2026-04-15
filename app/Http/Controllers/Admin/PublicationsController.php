<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::ordered()->paginate(15);

        return view('pages.dashboard.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|in:Annual Report,Legal Act,Policy',
            'file' => 'required|file|mimes:pdf|max:10240',
            'published_date' => 'required|date',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'category', 'published_date', 'is_active', 'order']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = $file->store('publications', 'public');
            $data['file_size'] = $this->formatBytes($file->getSize());
            $data['file_type'] = strtoupper($file->getClientOriginalExtension());
        }

        Publication::create($data);

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        return view('pages.dashboard.publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view('pages.dashboard.publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|in:Annual Report,Legal Act,Policy',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'published_date' => 'required|date',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'category', 'published_date', 'is_active', 'order']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            if ($publication->file_path && Storage::disk('public')->exists($publication->file_path)) {
                Storage::disk('public')->delete($publication->file_path);
            }
            $file = $request->file('file');
            $data['file_path'] = $file->store('publications', 'public');
            $data['file_size'] = $this->formatBytes($file->getSize());
            $data['file_type'] = strtoupper($file->getClientOriginalExtension());
        }

        $publication->update($data);

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        if ($publication->file_path && Storage::disk('public')->exists($publication->file_path)) {
            Storage::disk('public')->delete($publication->file_path);
        }

        $publication->delete();

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication deleted successfully.');
    }

    private function formatBytes($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        if ($bytes === 1) {
            return '1 byte';
        }

        return $bytes . ' bytes';
    }
}
