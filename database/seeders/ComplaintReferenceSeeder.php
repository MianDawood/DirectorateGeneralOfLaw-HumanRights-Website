<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintReferenceSeeder extends Seeder
{
    public function run(): void
    {
        Complaint::whereNull('reference_no')->get()->each(function ($complaint) {
            $complaint->forceFill([
                'reference_no' => 'CMP-' . ($complaint->created_at?->format('Y') ?: now()->format('Y')) . '-' . str_pad($complaint->id, 5, '0', STR_PAD_LEFT),
            ])->saveQuietly();
        });
    }
}