<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatWeDo;
use App\Models\WhatWeDoActivity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class WhatWeDosController extends Controller
{
    /**
     * Display the edit form for the What We Do page.
     */
    public function edit(): View
    {
        $whatWeDos = WhatWeDo::orderBy('id')->get();
        $activities = WhatWeDoActivity::orderBy('order')->get();

        return view('pages.dashboard.what-we-dos.edit', compact('whatWeDos', 'activities'));
    }

    /**
     * Update the What We Do page content (sections + activities).
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'what_we_dos' => 'nullable|array',
            'what_we_dos.*.heading' => 'nullable|string',
            'what_we_dos.*.description' => 'nullable|string',
            'what_we_dos.*.extra_description' => 'nullable|string',
            'what_we_dos.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'what_we_dos.*.is_active' => 'nullable',
            'activities' => 'nullable|array',
            'activities.*.title' => 'nullable|string',
            'activities.*.description' => 'nullable|string',
            'activities.*.order' => 'nullable|integer',
            'activities.*.is_active' => 'nullable',
            'deleted_activities' => 'nullable|array',
            'deleted_activities.*' => 'nullable|integer',
            'deleted_activities_json' => 'nullable|string',
        ]);

        // --------------------------------------------------------------
        // 1. Handle WhatWeDo Sections (main content blocks)
        // --------------------------------------------------------------
        if ($request->has('what_we_dos')) {
            foreach ($request->input('what_we_dos') as $id => $data) {
                $whatWeDo = WhatWeDo::find($id);
                if ($whatWeDo) {
                    $whatWeDo->update([
                        'heading' => $data['heading'] ?? null,
                        'description' => $data['description'] ?? null,
                        'extra_description' => $data['extra_description'] ?? null,
                        'is_active' => isset($data['is_active']),
                    ]);

                    // Handle image upload
                    if ($request->hasFile("what_we_dos.{$id}.image")) {
                        if ($whatWeDo->image && File::exists(public_path($whatWeDo->image))) {
                            File::delete(public_path($whatWeDo->image));
                        }

                        $image = $request->file("what_we_dos.{$id}.image");
                        $filename = time() . '_section_' . $id . '.' . $image->getClientOriginalExtension();
                        $uploadPath = public_path('uploads/what-we-do');
                        if (!File::isDirectory($uploadPath)) {
                            File::makeDirectory($uploadPath, 0755, true);
                        }
                        $image->move($uploadPath, $filename);
                        $whatWeDo->update(['image' => 'uploads/what-we-do/' . $filename]);
                    }
                }
            }
        }

        // --------------------------------------------------------------
        // 2. Delete activities (from standard array fallback)
        // --------------------------------------------------------------
        if ($request->has('deleted_activities')) {
            WhatWeDoActivity::destroy($request->input('deleted_activities'));
        }

        // --------------------------------------------------------------
        // 3. Delete activities (from JSON fallback)
        // --------------------------------------------------------------
        if ($request->filled('deleted_activities_json')) {
            $deletedIds = json_decode($request->input('deleted_activities_json'), true);
            if (is_array($deletedIds) && !empty($deletedIds)) {
                WhatWeDoActivity::destroy($deletedIds);
            }
        }

        // --------------------------------------------------------------
        // 4. Create or update activities
        // --------------------------------------------------------------
        if ($request->has('activities')) {
            foreach ($request->input('activities') as $key => $activityData) {
                $payload = [
                    'title'       => $activityData['title'] ?? null,
                    'description' => $activityData['description'] ?? null,
                    'order'       => $activityData['order'] ?? 0,
                    'is_active'   => isset($activityData['is_active']),
                ];

                if (is_numeric($key)) {
                    WhatWeDoActivity::where('id', $key)->update($payload);
                } else {
                    if (!empty($payload['title']) || !empty($payload['description'])) {
                        WhatWeDoActivity::create($payload);
                    }
                }
            }
        }

        return redirect()
            ->route('admin.what-we-dos.edit')
            ->with('success', 'What We Do content updated successfully.');
    }

    /**
     * Delete a single activity asynchronously (AJAX).
     */
    public function destroyActivity(WhatWeDoActivity $activity): JsonResponse
    {
        $activity->delete();
        return response()->json(['success' => true]);
    }
}