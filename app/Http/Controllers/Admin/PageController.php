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
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $pages = Page::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%")
                        ->orWhere('meta_title', 'like', "%{$search}%");
                });
            })
            ->orderBy('order')
            ->orderBy('title')
            ->paginate(15)
            ->withQueryString();

        return view('pages.dashboard.pages.index', compact('pages', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentPages = Page::whereNull('parent_id')->orderBy('title')->get();
        return view('pages.dashboard.pages.create', compact('parentPages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent_selection' => 'nullable|string',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
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

        if ($request->filled('parent_selection')) {
            if (Str::startsWith($request->parent_selection, 'static:')) {
                $data['static_parent'] = Str::after($request->parent_selection, 'static:');
                $data['parent_id'] = null;
            } else {
                $data['parent_id'] = $request->parent_selection;
                $data['static_parent'] = null;
            }
        } else {
            $data['parent_id'] = null;
            $data['static_parent'] = null;
        }
        
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['show_in_navigation'] = $request->has('show_in_navigation');
        $data['order'] = $request->order ?? 0;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = $file->hashName();
            $file->move(public_path('storage/pages'), $filename);
            $data['file_path'] = 'pages/' . $filename;
        }

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
        $parentPages = Page::whereNull('parent_id')
                          ->where('id', '!=', $page->id)
                          ->orderBy('title')
                          ->get();
        return view('pages.dashboard.pages.edit', compact('page', 'parentPages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'parent_selection' => 'nullable|string',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
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

        if ($request->filled('parent_selection')) {
            if (Str::startsWith($request->parent_selection, 'static:')) {
                $data['static_parent'] = Str::after($request->parent_selection, 'static:');
                $data['parent_id'] = null;
            } else {
                $data['parent_id'] = $request->parent_selection;
                $data['static_parent'] = null;
            }
        } else {
            $data['parent_id'] = null;
            $data['static_parent'] = null;
        }
        
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['show_in_navigation'] = $request->has('show_in_navigation');
        $data['order'] = $request->order ?? 0;

        if ($request->hasFile('file_path')) {
            if ($page->file_path && storage_exists($page->file_path)) {
                storage_delete($page->file_path);
            }
            $file = $request->file('file_path');
            $filename = $file->hashName();
            $file->move(public_path('storage/pages'), $filename);
            $data['file_path'] = 'pages/' . $filename;
        } elseif ($request->has('remove_file') && $page->file_path) {
            if (storage_exists($page->file_path)) {
                storage_delete($page->file_path);
            }
            $data['file_path'] = null;
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if ($page->file_path && storage_exists($page->file_path)) {
            storage_delete($page->file_path);
        }

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
            'upload' => 'required|file|max:2048'
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = $file->hashName();
            $file->move(public_path('storage/page-content-images'), $filename);
            $url = asset('storage/page-content-images/' . $filename);
            
            return response()->json([
                'uploaded' => true,
                'url' => $url,
                'default' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
