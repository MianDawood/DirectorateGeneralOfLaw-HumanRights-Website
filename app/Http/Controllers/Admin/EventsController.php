<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\EventVideo;
use App\Support\YoutubeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::withCount(['images', 'videos'])->ordered()->paginate(15);

        return view('pages.dashboard.events.index', compact('events'));
    }

    public function create()
    {
        return view('pages.dashboard.events.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateEvent($request);

        $event = Event::create($this->eventAttributes($request, $validated));

        $this->syncImages($event, $request);
        $this->syncYoutubeVideos($event, $request->input('youtube_urls', []));
        $this->refreshCoverImage($event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        $event->load(['images', 'videos']);

        return view('pages.dashboard.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $event->load(['images', 'videos']);

        return view('pages.dashboard.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $this->validateEvent($request);

        $event->update($this->eventAttributes($request, $validated));

        $this->deleteMarkedImages($event, $request->input('remove_images', []));
        $this->syncImages($event, $request);
        $this->syncYoutubeVideos($event, $request->input('youtube_urls', []), $request->input('remove_videos', []));
        $this->refreshCoverImage($event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $this->deleteAllEventMedia($event);
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    private function validateEvent(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'youtube_urls' => 'nullable|array',
            'youtube_urls.*' => 'nullable|string|max:500',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'integer|exists:event_images,id',
            'remove_videos' => 'nullable|array',
            'remove_videos.*' => 'integer|exists:event_videos,id',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);
    }

    private function eventAttributes(Request $request, array $validated): array
    {
        return [
            'title' => $validated['title'],
            'subject' => $validated['subject'] ?? null,
            'description' => $validated['description'],
            'location' => $validated['location'],
            'event_date' => $validated['event_date'],
            'order' => $validated['order'] ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ];
    }

    private function syncImages(Event $event, Request $request): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $maxOrder = (int) $event->images()->max('order');

        foreach ($request->file('images') as $index => $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $event->images()->create([
                'image_path' => $file->store('events/gallery', 'public'),
                'order' => $maxOrder + $index + 1,
            ]);
        }
    }

    private function syncYoutubeVideos(Event $event, array $urls, array $removeIds = []): void
    {
        if (!empty($removeIds)) {
            $toRemove = $event->videos()->whereIn('id', $removeIds)->get();
            foreach ($toRemove as $video) {
                $video->delete();
            }
        }

        $maxOrder = (int) $event->videos()->max('order');
        $added = 0;

        foreach ($urls as $url) {
            $url = is_string($url) ? trim($url) : '';
            if ($url === '') {
                continue;
            }

            $videoId = YoutubeHelper::extractVideoId($url);
            if (!$videoId) {
                continue;
            }

            $normalized = YoutubeHelper::normalizeUrl($url);

            $exists = $event->videos()
                ->where('youtube_video_id', $videoId)
                ->exists();

            if ($exists) {
                continue;
            }

            $event->videos()->create([
                'youtube_url' => $normalized,
                'youtube_video_id' => $videoId,
                'order' => $maxOrder + ++$added,
            ]);
        }
    }

    private function deleteMarkedImages(Event $event, array $removeIds): void
    {
        if (empty($removeIds)) {
            return;
        }

        $images = $event->images()->whereIn('id', $removeIds)->get();
        foreach ($images as $image) {
            $this->deleteImageFile($image->image_path);
            $image->delete();
        }
    }

    private function refreshCoverImage(Event $event): void
    {
        $event->load('images');
        $first = $event->images->first();

        if ($first) {
            if ($event->image_path && $event->image_path !== $first->image_path) {
                $stillUsed = $event->images()->where('image_path', $event->image_path)->exists();
                if (!$stillUsed) {
                    $this->deleteImageFile($event->image_path);
                }
            }
            $event->update(['image_path' => $first->image_path]);

            return;
        }

        if ($event->image_path) {
            $this->deleteImageFile($event->image_path);
            $event->update(['image_path' => null]);
        }
    }

    private function deleteAllEventMedia(Event $event): void
    {
        $event->load(['images', 'videos']);

        foreach ($event->images as $image) {
            $this->deleteImageFile($image->image_path);
            $image->delete();
        }

        $event->videos()->delete();

        if ($event->image_path) {
            $this->deleteImageFile($event->image_path);
        }
    }

    private function deleteImageFile(?string $path): void
    {
        if ($path && storage_exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
