<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('order')
                     ->orderBy('title')
                     ->paginate(15);
        
        return view('pages.dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'show_in_navigation' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'title', 'content', 'meta_title', 'meta_description', 
            'meta_keywords', 'status'
        ]);
        
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['show_in_navigation'] = $request->has('show_in_navigation');
        $data['order'] = $request->order ?? 0;

        Page::create($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('pages.dashboard.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('pages.dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'show_in_navigation' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'title', 'content', 'meta_title', 'meta_description', 
            'meta_keywords', 'status'
        ]);
        
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['show_in_navigation'] = $request->has('show_in_navigation');
        $data['order'] = $request->order ?? 0;

        $page->update($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    /**
     * Toggle the status of a page.
     */
    public function toggleStatus(Page $page)
    {
        $newStatus = $page->status === 'published' ? 'draft' : 'published';
        $page->update(['status' => $newStatus]);

        return redirect()->back()
            ->with('success', "Page status changed to {$newStatus}.");
    }

    /**
     * Toggle navigation visibility of a page.
     */
    public function toggleNavigation(Page $page)
    {
        $page->update(['show_in_navigation' => !$page->show_in_navigation]);

        return redirect()->back()
            ->with('success', 'Navigation visibility updated.');
    }

    /**
     * Duplicate a page.
     */
    public function duplicate(Page $page)
    {
        $newPage = $page->replicate();
        $newPage->title = $page->title . ' (Copy)';
        $newPage->slug = Str::slug($newPage->title);
        $newPage->status = 'draft';
        $newPage->save();

        return redirect()->route('admin.pages.edit', $newPage)
            ->with('success', 'Page duplicated successfully.');
    }

    /**
     * Upload image for CKEditor.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('page-content-images', 'public');
            $url = asset('storage/' . $path);
            
            return response()->json([
                'uploaded' => true,
                'url' => $url,
                'default' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
