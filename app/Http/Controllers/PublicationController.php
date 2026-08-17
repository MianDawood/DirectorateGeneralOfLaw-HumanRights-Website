<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Publication::active()->ordered();

        if ($request->filled('category') && $request->category !== 'All') {
            $query->byCategory($request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $publications = $query->paginate(12);
        $categories = Publication::active()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('pages.publications', compact('publications', 'categories'));
    }

    public function download($id)
    {
        $publication = Publication::findOrFail($id);
        $filePath = storage_path('app/public/' . $publication->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }
}
