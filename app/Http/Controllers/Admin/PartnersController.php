<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::ordered()->paginate(15);

        return view('pages.dashboard.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('pages.dashboard.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'required|file|max:2048',
            'url' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'description', 'url', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        $file = $request->file('logo');
        $filename = $file->hashName();
        $file->move(public_path('storage/partners'), $filename);
        $data['logo_path'] = 'partners/' . $filename;

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner created successfully.');
    }

    public function show(Partner $partner)
    {
        return view('pages.dashboard.partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('pages.dashboard.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|file|max:2048',
            'url' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'description', 'url', 'order', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($partner->logo_path && storage_exists($partner->logo_path)) {
                storage_delete($partner->logo_path);
            }
            $file = $request->file('logo');
            $filename = $file->hashName();
            $file->move(public_path('storage/partners'), $filename);
            $data['logo_path'] = 'partners/' . $filename;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_path && storage_exists($partner->logo_path)) {
            storage_delete($partner->logo_path);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner deleted successfully.');
    }
}
