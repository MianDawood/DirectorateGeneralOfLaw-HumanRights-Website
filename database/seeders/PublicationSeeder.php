<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publications = [
            [
                'title' => 'Khyber Pakhtunkhwa Protection of Communal Properties Act 2014',
                'description' => 'A comprehensive overview of the protection granted to minority communal properties and assets across the province.',
                'category' => 'Legal Act',
                'file_path' => 'publications/protection-act-2014.pdf',
                'file_size' => '2.4 MB',
                'published_date' => '2024-01-15',
                'order' => 1,
            ],
            [
                'title' => 'Annual Human Rights Report 2023',
                'description' => 'Comprehensive annual report detailing human rights activities, achievements, and challenges faced in Khyber Pakhtunkhwa.',
                'category' => 'Annual Report',
                'file_path' => 'publications/annual-report-2023.pdf',
                'file_size' => '3.1 MB',
                'published_date' => '2024-03-01',
                'order' => 2,
            ],
            [
                'title' => 'Policy Guidelines for NGO Registration',
                'description' => 'Official guidelines and procedures for non-governmental organizations seeking registration in the province.',
                'category' => 'Policy',
                'file_path' => 'publications/ngo-guidelines.pdf',
                'file_size' => '1.8 MB',
                'published_date' => '2024-02-10',
                'order' => 3,
            ],
            [
                'title' => 'Human Rights Protection Ordinance 2020',
                'description' => 'Legal framework for the protection and promotion of human rights in Khyber Pakhtunkhwa.',
                'category' => 'Legal Act',
                'file_path' => 'publications/hr-ordinance-2020.pdf',
                'file_size' => '2.9 MB',
                'published_date' => '2024-01-20',
                'order' => 4,
            ],
            [
                'title' => 'Annual Human Rights Report 2022',
                'description' => 'Detailed report covering human rights initiatives and developments throughout the year 2022.',
                'category' => 'Annual Report',
                'file_path' => 'publications/annual-report-2022.pdf',
                'file_size' => '2.7 MB',
                'published_date' => '2023-12-15',
                'order' => 5,
            ],
            [
                'title' => 'Guidelines for Minority Rights Protection',
                'description' => 'Comprehensive guidelines for the protection and promotion of minority rights in the province.',
                'category' => 'Policy',
                'file_path' => 'publications/minority-rights-guidelines.pdf',
                'file_size' => '1.5 MB',
                'published_date' => '2024-02-28',
                'order' => 6,
            ],
            [
                'title' => 'Women Rights Protection Act 2018',
                'description' => 'Legal provisions for the protection and advancement of women\'s rights in Khyber Pakhtunkhwa.',
                'category' => 'Legal Act',
                'file_path' => 'publications/women-rights-act-2018.pdf',
                'file_size' => '2.2 MB',
                'published_date' => '2024-01-30',
                'order' => 7,
            ],
            [
                'title' => 'Annual Human Rights Report 2021',
                'description' => 'Comprehensive documentation of human rights activities and achievements for the year 2021.',
                'category' => 'Annual Report',
                'file_path' => 'publications/annual-report-2021.pdf',
                'file_size' => '2.8 MB',
                'published_date' => '2023-11-20',
                'order' => 8,
            ],
        ];

        foreach ($publications as $publication) {
            Publication::create($publication);
        }
    }
}
