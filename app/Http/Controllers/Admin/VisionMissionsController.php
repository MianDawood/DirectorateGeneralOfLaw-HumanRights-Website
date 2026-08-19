<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisionMissionsController extends Controller
{
    private const SECTIONS = [
        'vision' => [
            'title' => 'Vision',
            'description' => 'Our vision is of a Khyber Pakhtunkhwa Province in which every person\'s Human Rights are respected and he/she is able to enjoy life in all its fullness.',
        ],
        'mission' => [
            'title' => 'Mission',
            'description' => 'Directorate of Human Rights Government of Khyber Pakhtunkhwa\'s Mission is to Promote, Protect and Enforce Human Rights in the Province of Khyber Pakhtunkhwa, as guaranteed by the Constitution of Islamic Republic of Pakistan and various International Conventions, Treaties, Covenants and Agreements to which Pakistan is a state party or shall become a state party.',
        ],
        'core_values' => [
            'title' => 'Core Values',
            'description' => 'Directorate of Human Rights, a statutory and independent institution under the general supervision of Law, Parliamentary Affairs & Human Rights Department Government of Khyber Pakhtunkhwa, is committed to upholding these core values:',
        ],
    ];

    public function edit(): View
    {
        $sections = VisionMission::whereIn('section', array_keys(self::SECTIONS))
            ->orderByRaw("FIELD(section, 'vision', 'mission', 'core_values')")
            ->get()
            ->keyBy('section');

        foreach (self::SECTIONS as $key => $defaults) {
            if (!$sections->has($key)) {
                $sections->put($key, VisionMission::create([
                    'section' => $key,
                    'title' => $defaults['title'],
                    'description' => $defaults['description'],
                    'is_active' => true,
                ]));
            }
        }

        return view('pages.dashboard.vision-missions.edit', compact('sections'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'sections' => 'required|array',
            'sections.*.title' => 'nullable|string',
            'sections.*.description' => 'nullable|string',
            'sections.*.image' => 'nullable|file',
            'sections.*.is_active' => 'nullable',
        ]);

        foreach ($request->input('sections') as $id => $data) {
            $section = VisionMission::find($id);
            if (!$section) {
                continue;
            }

            $section->update([
                'title' => $data['title'] ?? null,
                'description' => $data['description'] ?? null,
                'is_active' => isset($data['is_active']),
            ]);

            if ($request->hasFile("sections.{$id}.image")) {
                $this->deleteImage($section->image);

                $file = $request->file("sections.{$id}.image");
                $filename = $file->hashName();
                $file->move(public_path('storage/vision-missions'), $filename);
                $section->update(['image' => 'vision-missions/' . $filename]);
            }
        }

        return redirect()
            ->route('admin.vision-missions.edit')
            ->with('success', 'Vision & Mission page updated successfully.');
    }

    private function deleteImage(?string $path): void
    {
        if ($path) {
            storage_delete($path);
        }
    }
}