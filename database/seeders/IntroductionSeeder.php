<?php

namespace Database\Seeders;

use App\Models\Introduction;
use App\Models\IntroductionHead;
use Illuminate\Database\Seeder;

class IntroductionSeeder extends Seeder
{
    public function run(): void
    {
        Introduction::create([
            'title' => 'Directorate General of Law & Human Rights',
            'description' => 'The Directorate General of Law & Human Rights is committed to upholding the rule of law and protecting human rights across the province. Our mission is to provide accessible legal services and ensure justice for all citizens.',
            'image' => 'uploads/introductions/hero_bg.webp',
            'is_active' => true,
        ]);

        IntroductionHead::create([
            'name' => 'John Doe',
            'role' => 'Director General',
            'message' => 'Welcome to the Directorate General of Law & Human Rights. We are dedicated to serving the people and ensuring that human rights are respected and protected.',
            'image' => 'uploads/introductions/heads/dg.webp',
            'profile_url' => '#',
            'order' => 0,
            'is_active' => true,
        ]);
    }
}
