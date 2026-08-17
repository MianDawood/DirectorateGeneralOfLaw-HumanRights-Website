<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [];

        $photoPaths = [
            'images/hero image 1.jpg',
            'images/hero image 2.png',
            'images/hero image 3.png',
            'images/hero image 4.jpg',
            'images/hero image 5.jpg',
            'images/event 1.jpeg',
            'images/event 2.jpg',
            'images/event 3.jpg',
            'images/event 4.jpg',
            'images/event 5.jpg',
            'images/event 6.jpg',
            'images/introduction 1.jpeg',
            'images/introduction 2.jpg',
        ];

        foreach ($photoPaths as $index => $path) {
            $items[] = [
                'type' => 'photo',
                'title' => 'Gallery Image ' . ($index + 1),
                'description' => null,
                'media_path' => $path,
                'thumbnail_path' => null,
                'duration' => null,
                'status' => 'active',
                'order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $videoItems = [
            [
                'title' => 'Directorate Latest Activities',
                'description' => "Recent highlights and major updates from the department's ongoing efforts.",
                'media_path' => 'images/media page video 1.mp4',
                'thumbnail_path' => null,
                'duration' => null,
                'order' => 101,
            ],
            [
                'title' => 'Building Awareness in Districts',
                'description' => 'Highlights from the community engagement seminars held across Peshawar.',
                'media_path' => null,
                'thumbnail_path' => 'images/hero image 5.jpg',
                'duration' => '03:45',
                'order' => 102,
            ],
            [
                'title' => 'Provincial Steering Meeting Highlight',
                'description' => 'Complete coverage of the high-level committee meeting chaired by the Director General.',
                'media_path' => null,
                'thumbnail_path' => 'images/introduction 1.jpeg',
                'duration' => '05:12',
                'order' => 103,
            ],
            [
                'title' => 'NGO Registration Session Summary',
                'description' => 'Summary of the capacity building workshop for NGOs registration in KP province.',
                'media_path' => null,
                'thumbnail_path' => 'images/introduction 2.jpg',
                'duration' => '04:20',
                'order' => 104,
            ],
            [
                'title' => 'Devolved Rights Workshop',
                'description' => 'UNDP organized a Consultative Workshop at PC Hotel Peshawar.',
                'media_path' => null,
                'thumbnail_path' => 'images/event 4.jpg',
                'duration' => '02:15',
                'order' => 105,
            ],
            [
                'title' => 'Strategic Meeting with UNDP',
                'description' => 'Discussion on human rights and decentralized governance held with the Director General.',
                'media_path' => null,
                'thumbnail_path' => 'images/event 5.jpg',
                'duration' => '06:30',
                'order' => 106,
            ],
        ];

        foreach ($videoItems as $video) {
            $items[] = [
                'type' => 'video',
                'title' => $video['title'],
                'description' => $video['description'],
                'media_path' => $video['media_path'],
                'thumbnail_path' => $video['thumbnail_path'],
                'duration' => $video['duration'],
                'status' => 'active',
                'order' => $video['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        GalleryItem::query()->upsert(
            $items,
            ['type', 'title'],
            ['description', 'media_path', 'thumbnail_path', 'duration', 'status', 'order', 'updated_at']
        );
    }
}
