<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'facebook_url' => 'https://facebook.com/dhrkp',
            'twitter_url' => 'https://twitter.com/dhrkp',
            'instagram_url' => 'https://instagram.com/dhrkp',
            'youtube_url' => 'https://youtube.com/dhrkp',
            'contact_email' => 'dhr.kpk@gmail.com',
            'contact_phone' => '091-9217202',
            'contact_address' => 'Plot No. 21, Sector B-2, Phase-V, Hayatabad, Peshawar, Khyber Pakhtunkhwa.',
            'home_campaign_primary' => 'Marka-E-Haq',
            'home_campaign_secondary' => 'Anti-Corruption Week',
        ]);
    }
}
