<?php

namespace Database\Seeders;

use App\Models\OrgStructurePosition;
use Illuminate\Database\Seeder;

class OrgStructurePositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            [
                'title' => 'Director General',
                'subtitle' => 'Head of Directorate',
                'icon' => 'user',
                'order' => 1,
            ],
            [
                'title' => 'Additional Directors',
                'subtitle' => 'Law & HR Wings',
                'icon' => 'users',
                'order' => 2,
            ],
            [
                'title' => 'Deputy Directors',
                'subtitle' => 'Complaints, NGO, Admin',
                'icon' => 'briefcase',
                'order' => 3,
            ],
            [
                'title' => 'Support Staff',
                'subtitle' => 'Assistant Directors & Officers',
                'icon' => 'building-2',
                'order' => 4,
            ],
        ];

        foreach ($positions as $position) {
            OrgStructurePosition::updateOrCreate(
                ['title' => $position['title']],
                $position
            );
        }
    }
}