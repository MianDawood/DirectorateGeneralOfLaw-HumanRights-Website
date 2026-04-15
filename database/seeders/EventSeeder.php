<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'International Human Rights Conference 2026',
                'description' => 'A global gathering to discuss the future of human rights in the digital age.',
                'location' => 'Main Hall, Human Rights Center',
                'event_date' => Carbon::now()->addDays(15)->setHour(10)->setMinute(0),
                'image_path' => 'assets/images/events/event-1.jpg',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Community Awareness Workshop',
                'description' => 'Empowering local communities with knowledge about their legal rights.',
                'location' => 'Community Center, South District',
                'event_date' => Carbon::now()->addDays(20)->setHour(14)->setMinute(30),
                'image_path' => 'assets/images/events/event-2.jpg',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Policy Review Seminar',
                'description' => 'Annual review of human rights policies and advocacy strategies.',
                'location' => 'Conference Room B',
                'event_date' => Carbon::now()->addDays(30)->setHour(9)->setMinute(0),
                'image_path' => 'assets/images/events/event-3.jpg',
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
