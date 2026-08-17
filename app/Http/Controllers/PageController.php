<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified page by slug.
     */
    public function show($slug)
    {
        $page = Page::published()
                    ->where('slug', $slug)
                    ->firstOrFail();

        // Get navigation pages for sidebar/menu
        $navigationPages = Page::published()
                              ->inNavigation()
                              ->ordered()
                              ->get();

        return view('pages.page', compact('page', 'navigationPages'))
            ->with('metaTitle', $page->meta_title)
            ->with('metaDescription', $page->meta_description)
            ->with('metaKeywords', $page->meta_keywords);
    }

    /**
     * Get all published pages for API or JSON response.
     */
    public function index(Request $request)
    {
        $pages = Page::published()
                    ->inNavigation()
                    ->ordered()
                    ->get(['id', 'title', 'slug', 'meta_description']);

        if ($request->expectsJson()) {
            return response()->json($pages);
        }

        return view('pages.pages-list', compact('pages'));
    }

    /**
     * Search pages.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (!$query) {
            return response()->json([]);
        }

        $pages = Page::published()
                    ->where(function ($q) use ($query) {
                        $q->where('title', 'like', "%{$query}%")
                          ->orWhere('content', 'like', "%{$query}%")
                          ->orWhere('meta_description', 'like', "%{$query}%");
                    })
                    ->limit(10)
                    ->get(['id', 'title', 'slug', 'meta_description']);

        return response()->json($pages);
    }
}
