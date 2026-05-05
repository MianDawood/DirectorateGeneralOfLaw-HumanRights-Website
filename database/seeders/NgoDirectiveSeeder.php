<?php

namespace Database\Seeders;

use App\Models\NgoDirective;
use Illuminate\Database\Seeder;

class NgoDirectiveSeeder extends Seeder
{
    public function run(): void
    {
        NgoDirective::create([
            'heading' => 'Mandatory Registration Under',
            'desc_1' => 'Official regulatory framework and mandatory compliance requirements for NGOs in Khyber Pakhtunkhwa.',
            'desc_2' => "[The Khyber Pakhtunkhwa Non-Governmental Organizations Registration (Working in the Field of Human Rights) Rules, 2024.]\n\nAs per the enforcement of these rules, all existing Non-Governmental Organizations (NGOs) working in the field of human rights protection and not registered with the Directorate General Law and Human Rights are required to register themselves within sixty (60) days of the enforcement of these rules.",
            'card_1_title' => 'Late Penalties',
            'card_1_desc' => 'Imposition of late charges at the rate of [5% of the registration fee per day] after the sixty-day grace period.',
            'card_2_title' => 'Closure of Operations',
            'card_2_desc' => 'Failure to register within the stipulated time shall result in the [immediate closure of NGO operations] by the Directorate General.',
            'hero_image' => 'images/hero image 5.jpg',
            'is_active' => true,
        ]);
    }
}
