<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Mr. Ghulam Ali',
                'position' => 'Director General',
                'email' => 'dhr.kpk@gmail.com',
                'phone' => '091-9217205',
                'image_path' => 'images/introduction 1.jpeg',
                'status' => 'active',
                'order' => 1,
            ],
            [
                'name' => 'Mr. Maqsood Ali',
                'position' => 'Director',
                'email' => 'dhr.kpk@gmail.com',
                'phone' => '091-9217206',
                'image_path' => 'images/introduction 3.jpg',
                'status' => 'active',
                'order' => 2,
            ],
            [
                'name' => 'Mr. Sikandar Ali Khan',
                'position' => 'Deputy Director II',
                'email' => 'dhr.kpk@gmail.com',
                'phone' => '091-9217203',
                'image_path' => 'images/introduction 4.jpg',
                'status' => 'active',
                'order' => 3,
            ],
            [
                'name' => 'Mr. Rahid Ullah',
                'position' => 'Deputy Director IV',
                'email' => 'dhr.kpk@gmail.com',
                'phone' => '091-9217203',
                'image_path' => 'images/introduction 5.jpg',
                'status' => 'active',
                'order' => 4,
            ],
            [
                'name' => 'Muhammad Saqib',
                'position' => 'Assistant Director (IT)',
                'email' => 'dhr.kpk@gmail.com',
                'phone' => '091-9217203',
                'image_path' => 'images/introduction 2.jpg',
                'status' => 'active',
                'order' => 5,
            ],
        ];

        TeamMember::query()->upsert(
            $items,
            ['name'],
            ['position', 'email', 'phone', 'image_path', 'status', 'order', 'updated_at']
        );
    }
}
