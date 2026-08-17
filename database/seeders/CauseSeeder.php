<?php

namespace Database\Seeders;

use App\Models\Cause;
use Illuminate\Database\Seeder;

class CauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Legal Business of Human Rights',
            'Rights of Person with disabilities',
            'Child Labor',
            'Domestic Violence',
            'Violence against women',
        ];

        $items = [];
        foreach ($titles as $index => $title) {
            $items[] = [
                'title' => $title,
                'description' => null,
                'status' => 'active',
                'order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Cause::query()->upsert(
            $items,
            ['title'],
            ['description', 'status', 'order', 'updated_at']
        );
    }
}
