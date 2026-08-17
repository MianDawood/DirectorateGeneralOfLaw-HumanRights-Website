<?php

namespace Database\Seeders;

use App\Models\WhatWeDo;
use App\Models\WhatWeDoActivity;
use Illuminate\Database\Seeder;

class WhatWeDoSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        WhatWeDo::create([
            'heading' => 'What We',
            'description' => 'The Directorate of Human Rights, Khyber Pakhtunkhwa, is committed to safeguarding fundamental rights, promoting justice, and ensuring dignity for every citizen across the province.',
            'image' => 'images/whatwedo-hero.png',
            'is_active' => true,
        ]);

        // Mission Section
        WhatWeDo::create([
            'heading' => 'Directorate of',
            'description' => 'Human Rights',
            'extra_description' => 'The Directorate of Human Rights, Government of Khyber Pakhutnkhwa is statutory and independent institution under the general supervision of Law, Parlimentary Affairs and Human Rights Department and is working for the redressal of grivencess of victims of human rights violation in the province of Khyber Pakhtunkhwa.',
            'image' => 'images/hero image 2.png',
            'is_active' => true,
        ]);

        // Activity Cards
        $activities = [
            ['title' => 'Human Rights Awareness', 'description' => 'Educating communities about fundamental rights and responsibilities through public campaigns, workshops, seminars, and educational programs across all districts of Khyber Pakhtunkhwa.', 'order' => 1],
            ['title' => 'Legal Support & Guidance', 'description' => 'Providing assistance and guidance to individuals facing human rights violations, including free legal consultations, complaint resolution, and referral to appropriate judicial forums.', 'order' => 2],
            ['title' => 'Advocacy & Policy Support', 'description' => 'Promoting policies that ensure equality, justice, and dignity for all through legislative review, stakeholder consultations, and evidence-based policy recommendations.', 'order' => 3],
            ['title' => 'Community Engagement', 'description' => 'Working with communities, organizations, and institutions to protect and promote human rights through grassroots outreach, collaborative initiatives, and public forums.', 'order' => 4],
            ['title' => 'Research & Documentation', 'description' => 'Monitoring and documenting human rights issues to support transparency and accountability, including data collection, reporting, and publishing detailed research findings.', 'order' => 5],
        ];

        foreach ($activities as $activity) {
            WhatWeDoActivity::create([
                'title' => $activity['title'],
                'description' => $activity['description'],
                'order' => $activity['order'],
                'is_active' => true,
            ]);
        }
    }
}