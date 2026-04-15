<?php

namespace Database\Seeders;

use App\Models\Tender;
use Illuminate\Database\Seeder;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [];

        for ($i = 1; $i <= 6; $i++) {
            $items[] = [
                'title' => 'Provision of IT Equipment for Directorate',
                'description' => 'Procurement of laptops, desktop computers, and heavy-duty printers.',
                'reference_no' => 'DHR-IT-2026-0' . $i,
                'publish_date' => now()->setDate(2026, 5, 10 + $i)->startOfDay(),
                'closing_date' => now()->setDate(2026, 6, 10 + $i)->startOfDay(),
                'status' => $i <= 3 ? 'active' : 'closed',
                'file_path' => 'tenders/sample-tender.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Tender::query()->upsert(
            $items,
            ['reference_no'],
            ['title', 'description', 'publish_date', 'closing_date', 'status', 'file_path', 'updated_at']
        );
    }
}
