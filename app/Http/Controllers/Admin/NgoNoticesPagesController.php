<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoNoticesPage;
use Illuminate\Http\Request;

class NgoNoticesPagesController extends Controller
{
    public function index()
    {
        $sections = NgoNoticesPage::orderBy('order')->get();
        return view('pages.dashboard.ngo-notices-pages.index', compact('sections'));
    }

    public function create()
    {
        return view('pages.dashboard.ngo-notices-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_key' => 'required|string|unique:ngo_notices_pages,section_key',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        NgoNoticesPage::create([
            'section_key' => $request->section_key,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.ngo-notices-pages.index')->with('success', 'Content created successfully.');
    }

    public function show(NgoNoticesPage $ngoNoticesPage)
    {
        return view('pages.dashboard.ngo-notices-pages.show', compact('ngoNoticesPage'));
    }

    public function edit(NgoNoticesPage $ngoNoticesPage)
    {
        return view('pages.dashboard.ngo-notices-pages.edit', compact('ngoNoticesPage'));
    }

    public function update(Request $request, NgoNoticesPage $ngoNoticesPage)
    {
        $request->validate([
            'section_key' => 'required|string|unique:ngo_notices_pages,section_key,' . $ngoNoticesPage->id,
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $ngoNoticesPage->update([
            'section_key' => $request->section_key,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.ngo-notices-pages.index')->with('success', 'Content updated successfully.');
    }

    public function destroy(NgoNoticesPage $ngoNoticesPage)
    {
        $ngoNoticesPage->delete();
        return redirect()->route('admin.ngo-notices-pages.index')->with('success', 'Content deleted successfully.');
    }
}