<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingsController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::getSettings();
        return view('pages.dashboard.site-settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = SiteSetting::getSettings();
        
        $validated = $request->validate([
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'tiktok_url' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'home_campaign_primary' => 'sometimes|required|string|max:255',
            'home_campaign_secondary' => 'sometimes|required|string|max:255',
            'dg_signature_image' => 'nullable|file|max:2048',
            'site_name' => 'nullable|string|max:255',
            'logo' => 'nullable|file|image|max:2048',
            'favicon' => 'nullable|file|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('dg_signature_image')) {
            if ($settings->dg_signature_image && storage_exists($settings->dg_signature_image)) {
                storage_delete($settings->dg_signature_image);
            }
            $file = $request->file('dg_signature_image');
            $filename = $file->hashName();
            $file->move(public_path('storage/signatures'), $filename);
            $validated['dg_signature_image'] = 'signatures/' . $filename;
        }

        if ($request->hasFile('logo')) {
            if ($settings->logo && storage_exists($settings->logo)) {
                storage_delete($settings->logo);
            }
            $file = $request->file('logo');
            $filename = $file->hashName();
            $file->move(public_path('storage/logos'), $filename);
            $validated['logo'] = 'logos/' . $filename;
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon && storage_exists($settings->favicon)) {
                storage_delete($settings->favicon);
            }
            $file = $request->file('favicon');
            $filename = $file->hashName();
            $file->move(public_path('storage/icons'), $filename);
            $validated['favicon'] = 'icons/' . $filename;
        }

        if ($settings->exists) {
            $settings->update($validated);
        } else {
            SiteSetting::create($validated);
        }

        return back()->with('success', 'Site settings updated successfully.');
    }

    public function editHomePage(): View
    {
        return $this->index();
    }

    public function updateHomePage(Request $request): RedirectResponse
    {
        return $this->update($request);
    }
}
