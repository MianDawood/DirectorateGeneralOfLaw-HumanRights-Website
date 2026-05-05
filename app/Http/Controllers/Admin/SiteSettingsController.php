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
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'home_campaign_primary' => 'required|string|max:255',
            'home_campaign_secondary' => 'required|string|max:255',
        ]);

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
