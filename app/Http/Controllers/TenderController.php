<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index(Request $request)
    {
        $query = Tender::query()
            ->where('status', 'active')
            ->orderBy('publish_date', 'desc')
            ->orderBy('reference_no');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('reference_no', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $tenders = $query->paginate(10);

        return view('pages.tenders', compact('tenders'));
    }

    public function download($id)
    {
        $tender = Tender::findOrFail($id);
        $filePath = public_path('storage/' . $tender->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }
}
