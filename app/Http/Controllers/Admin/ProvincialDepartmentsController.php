<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProvincialDepartment;
use Illuminate\Http\Request;

class ProvincialDepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $departments = ProvincialDepartment::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");
                });
            })
            ->ordered()
            ->paginate(15)
            ->withQueryString();

        return view('pages.dashboard.provincial-departments.index', compact('departments', 'search'));
    }

    public function create()
    {
        return view('pages.dashboard.provincial-departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'url', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        ProvincialDepartment::create($data);

        return redirect()->route('admin.provincial-departments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(ProvincialDepartment $department)
    {
        return view('pages.dashboard.provincial-departments.edit', compact('department'));
    }

    public function update(Request $request, ProvincialDepartment $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'url', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        $department->update($data);

        return redirect()->route('admin.provincial-departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(ProvincialDepartment $department)
    {
        $department->delete();

        return redirect()->route('admin.provincial-departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}