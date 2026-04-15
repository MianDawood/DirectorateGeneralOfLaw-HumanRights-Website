<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            AdminUserSeeder::class,
            OfficialMessagesSeeder::class,
            NewsSeeder::class,
            PublicationSeeder::class,
            TenderSeeder::class,
            CauseSeeder::class,
            TeamMemberSeeder::class,
            GallerySeeder::class,
            NgoNoticeSeeder::class,
            EventSeeder::class,
            RegistrationApplicationsSeeder::class,
        ]);
    }
}
