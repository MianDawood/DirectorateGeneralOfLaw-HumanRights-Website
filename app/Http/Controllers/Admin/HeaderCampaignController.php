<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderCampaign;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderCampaignController extends Controller
{
    public function index(): View
    {
        $campaigns = HeaderCampaign::ordered()->paginate(15);

        return view('pages.dashboard.header-campaigns.index', compact('campaigns'));
    }

    public function create(): View
    {
        return view('pages.dashboard.header-campaigns.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request, true);
        $data['is_active'] = $request->boolean('is_active');
        $file = $request->file('image');
        $filename = $file->hashName();
        $file->move(public_path('storage/header-campaigns'), $filename);
        $data['image_path'] = 'header-campaigns/' . $filename;

        HeaderCampaign::create($data);

        return redirect()
            ->route('admin.header-campaigns.index')
            ->with('success', 'Header campaign created successfully.');
    }

    public function edit(HeaderCampaign $headerCampaign): View
    {
        return view('pages.dashboard.header-campaigns.edit', compact('headerCampaign'));
    }

    public function update(Request $request, HeaderCampaign $headerCampaign): RedirectResponse
    {
        $data = $this->validatedData($request, false);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($headerCampaign->image_path && storage_exists($headerCampaign->image_path)) {
                storage_delete($headerCampaign->image_path);
            }

            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/header-campaigns'), $filename);
            $data['image_path'] = 'header-campaigns/' . $filename;
        }

        $headerCampaign->update($data);

        return redirect()
            ->route('admin.header-campaigns.index')
            ->with('success', 'Header campaign updated successfully.');
    }

    public function destroy(HeaderCampaign $headerCampaign): RedirectResponse
    {
        if ($headerCampaign->image_path && storage_exists($headerCampaign->image_path)) {
            storage_delete($headerCampaign->image_path);
        }

        $headerCampaign->delete();

        return redirect()
            ->route('admin.header-campaigns.index')
            ->with('success', 'Header campaign deleted successfully.');
    }

    protected function validatedData(Request $request, bool $isCreate): array
    {
        return $request->validate([
            'title' => 'nullable|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => [$isCreate ? 'required' : 'nullable', 'file', 'max:4096'],
        ]);
    }
}
