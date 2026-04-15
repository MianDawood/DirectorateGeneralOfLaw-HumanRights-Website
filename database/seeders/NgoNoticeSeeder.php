<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NgoNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\NgoNotice::create([
            'title' => 'Mandatory Re-registration for 2026',
            'description' => 'All NGOs registered under the 2024 rules are required to submit their annual progress reports and update their registration details by the end of June 2026.',
            'is_public_notice' => false,
        ]);

        \App\Models\NgoNotice::create([
            'title' => 'Amended Rules for Human Rights NGOs',
            'description' => 'The Government of Khyber Pakhtunkhwa has published the updated rules for Non-Governmental Organizations working in the field of Human Rights.',
            'is_public_notice' => false,
        ]);

        \App\Models\NgoNotice::create([
            'title' => 'Treasury Challan Update',
            'description' => 'Please note the change in Treasury Challan codes for NGO registration fees. The new codes are applicable effectively from March 1st.',
            'is_public_notice' => false,
        ]);

        \App\Models\NgoNotice::create([
            'title' => 'Public Notice',
            'description' => 'Official Announcement regarding NGOs.',
            'image' => 'notices/seed_public_notice.jpg',
            'is_public_notice' => true,
        ]);
    }
}
