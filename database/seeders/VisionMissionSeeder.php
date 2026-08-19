<?php

namespace Database\Seeders;

use App\Models\Introduction;
use App\Models\VisionMission;
use Illuminate\Database\Seeder;

class VisionMissionSeeder extends Seeder
{
    public function run(): void
    {
        $legacyRows = Introduction::orderBy('id')->get();

        $sections = [
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

        $position = [
            'vision' => 1,
            'mission' => 2,
            'core_values' => 3,
        ];

        foreach ($sections as $section => $defaults) {
            if (VisionMission::where('section', $section)->exists()) {
                continue;
            }

            $legacy = $legacyRows->get($position[$section]);

            VisionMission::create([
                'section' => $section,
                'title' => $legacy->title ?? $defaults['title'],
                'description' => $legacy->description ?? $defaults['description'],
                'image' => $legacy->image ?? null,
                'is_active' => true,
            ]);
        }
    }
}