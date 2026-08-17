<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;


class TendersController extends Controller
{
    public function index(Request $request)
    {
        $query = Tender::query()
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

        $tenders = $query->paginate(15)->withQueryString();

        return view('pages.dashboard.tenders.index', compact('tenders'));
    }

    public function create()
    {
        return view('pages.dashboard.tenders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reference_no' => 'required|string|max:100|unique:tenders,reference_no',
            'publish_date' => 'required|date',
            'closing_date' => 'required|date|after_or_equal:publish_date',
            'status' => 'required|string|max:20',
            'file' => 'nullable|file|max:10240',
        ]);

        $data = $request->only([
            'title',
            'description',
            'reference_no',
            'publish_date',
            'closing_date',
            'status',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->hashName();
            $file->move(public_path('storage/tenders'), $filename);
            $data['file_path'] = 'tenders/' . $filename;
        }

        Tender::create($data);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Tender created successfully.');
    }

    public function show(Tender $tender)
    {
        return view('pages.dashboard.tenders.show', compact('tender'));
    }

    public function edit(Tender $tender)
    {
        return view('pages.dashboard.tenders.edit', compact('tender'));
    }

    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reference_no' => 'required|string|max:100|unique:tenders,reference_no,' . $tender->id,
            'publish_date' => 'required|date',
            'closing_date' => 'required|date|after_or_equal:publish_date',
            'status' => 'required|string|max:20',
            'file' => 'nullable|file|max:10240',
        ]);

        $data = $request->only([
            'title',
            'description',
            'reference_no',
            'publish_date',
            'closing_date',
            'status',
        ]);

        if ($request->hasFile('file')) {
            if ($tender->file_path && storage_exists($tender->file_path)) {
                storage_delete($tender->file_path);
            }
            $file = $request->file('file');
            $filename = $file->hashName();
            $file->move(public_path('storage/tenders'), $filename);
            $data['file_path'] = 'tenders/' . $filename;
        }

        $tender->update($data);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Tender updated successfully.');
    }

    public function destroy(Tender $tender)
    {
        if ($tender->file_path && storage_exists($tender->file_path)) {
            storage_delete($tender->file_path);
        }

        $tender->delete();

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Tender deleted successfully.');
    }
}
