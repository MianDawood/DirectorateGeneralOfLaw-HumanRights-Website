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
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'status', 'order']);
        $data['order'] = $data['order'] ?? 0;

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
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'description', 'status', 'order']);
        $data['order'] = $data['order'] ?? 0;

        $cause->update($data);

        return redirect()->route('admin.causes.index')
            ->with('success', 'Cause updated successfully.');
    }

    public function destroy(Cause $cause)
    {
        $cause->delete();

        return redirect()->route('admin.causes.index')
            ->with('success', 'Cause deleted successfully.');
    }
}
