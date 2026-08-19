<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use Illuminate\Http\Request;

class CausesController extends Controller
{
    public function index()
    {
        $causes = Cause::query()
            ->orderBy('order')
            ->orderBy('title')
            ->paginate(15);

        return view('pages.dashboard.causes.index', compact('causes'));
    }

    public function create()
    {
        return view('pages.dashboard.causes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:causes,title',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'status', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = $file->hashName();
            $file->move(public_path('storage/causes'), $filename);
            $data['file_path'] = 'causes/' . $filename;
        }

        Cause::create($data);

        return redirect()->route('admin.causes.index')
            ->with('success', 'Cause created successfully.');
    }

    public function show(Cause $cause)
    {
        return view('pages.dashboard.causes.show', compact('cause'));
    }

    public function edit(Cause $cause)
    {
        return view('pages.dashboard.causes.edit', compact('cause'));
    }

    public function update(Request $request, Cause $cause)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:causes,title,' . $cause->id,
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'status', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('file_path')) {
            if ($cause->file_path && storage_exists($cause->file_path)) {
                storage_delete($cause->file_path);
            }
            $file = $request->file('file_path');
            $filename = $file->hashName();
            $file->move(public_path('storage/causes'), $filename);
            $data['file_path'] = 'causes/' . $filename;
        } elseif ($request->has('remove_file') && $cause->file_path) {
            if (storage_exists($cause->file_path)) {
                storage_delete($cause->file_path);
            }
            $data['file_path'] = null;
        }

        $cause->update($data);

        return redirect()->route('admin.causes.index')
            ->with('success', 'Cause updated successfully.');
    }

    public function destroy(Cause $cause)
    {
        if ($cause->file_path && storage_exists($cause->file_path)) {
            storage_delete($cause->file_path);
        }

        $cause->delete();

        return redirect()->route('admin.causes.index')
            ->with('success', 'Cause deleted successfully.');
    }
}
