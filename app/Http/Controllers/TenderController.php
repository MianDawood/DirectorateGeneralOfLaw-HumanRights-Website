<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::query()
            ->orderBy('publish_date', 'desc')
            ->orderBy('reference_no')
            ->get();

        return view('pages.tenders', compact('tenders'));
    }

    public function download($id)
    {
        $tender = Tender::findOrFail($id);
        $filePath = storage_path('app/public/' . $tender->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }
}
