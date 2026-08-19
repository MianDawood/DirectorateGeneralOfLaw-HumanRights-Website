<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrgStructurePosition;
use Illuminate\Http\Request;

class OrgStructurePositionsController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $positions = OrgStructurePosition::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('subtitle', 'like', "%{$search}%");
                });
            })
            ->ordered()
            ->paginate(15)
            ->withQueryString();

        return view('pages.dashboard.org-structure-positions.index', compact('positions', 'search'));
    }

    public function create()
    {
        return view('pages.dashboard.org-structure-positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'subtitle', 'icon', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        OrgStructurePosition::create($data);

        return redirect()->route('admin.org-structure-positions.index')
            ->with('success', 'Position created successfully.');
    }

    public function edit(OrgStructurePosition $position)
    {
        return view('pages.dashboard.org-structure-positions.edit', compact('position'));
    }

    public function update(Request $request, OrgStructurePosition $position)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'subtitle', 'icon', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        $position->update($data);

        return redirect()->route('admin.org-structure-positions.index')
            ->with('success', 'Position updated successfully.');
    }

    public function destroy(OrgStructurePosition $position)
    {
        $position->delete();

        return redirect()->route('admin.org-structure-positions.index')
            ->with('success', 'Position deleted successfully.');
    }
}