<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Complaint;
use App\Models\Event;
use App\Models\News;
use App\Models\NgoApplication;
use App\Models\NgoRequiredDocument;
use App\Models\OfficialMessage;
use App\Models\Partner;
use App\Models\Publication;
use App\Models\Tender;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $officialMessages = OfficialMessage::active()->ordered()->get();

        $latestNews = News::active()->ordered()->take(3)->get();

        $latestTenders = Tender::query()
            ->orderBy('publish_date', 'desc')
            ->orderBy('reference_no')
            ->take(2)
            ->get();

        $latestCauses = Cause::query()
            ->where('status', 'active')
            ->orderBy('order')
            ->orderBy('title')
            ->take(5)
            ->get();

        $statsComplaintsTotal = Complaint::count();
        $statsComplaintsResolved = Complaint::where('status', 'resolved')->count();
        $statsNgosRegistered = NgoApplication::where('status', 'approved')->count();
        $statsTrainings = Event::where(function ($q) {
            $q->where('subject', 'LIKE', '%Training%')->orWhere('subject', 'LIKE', '%Workshop%');
        })->count();
        $statsAwareness = Event::where('subject', 'LIKE', '%Awareness%')->count();
        $statsResearch = Publication::active()->count();

        $partners = Partner::active()->ordered()->get();

        $downloads = NgoRequiredDocument::where('is_active', true)->orderBy('order')->get();

        $slides = collect();

        Event::active()->ordered()->whereNotNull('image_path')->get()->each(function ($event) use (&$slides) {
            $slides->push([
                'date' => $event->event_date ?? $event->created_at,
                'image_url' => asset('storage/' . $event->image_path),
                'title' => $event->title,
                'excerpt' => Str::limit(strip_tags($event->description ?? ''), 160),
                'link' => route('events.show', $event->id),
                'cta' => 'View Details',
            ]);
        });

        News::active()->ordered()->whereNotNull('image_path')->get()->each(function ($news) use (&$slides) {
            $slides->push([
                'date' => $news->published_date ?? $news->created_at,
                'image_url' => asset('storage/' . $news->image_path),
                'title' => $news->title,
                'excerpt' => Str::limit(strip_tags($news->excerpt ?? ''), 160),
                'link' => route('news_details', $news->id),
                'cta' => 'Read More',
            ]);
        });

        Publication::active()->ordered()->whereNotNull('image_path')->get()->each(function ($publication) use (&$slides) {
            $slides->push([
                'date' => $publication->published_date ?? $publication->created_at,
                'image_url' => asset('storage/' . $publication->image_path),
                'title' => $publication->title,
                'excerpt' => Str::limit(strip_tags($publication->description ?? ''), 160),
                'link' => route('publications'),
                'cta' => 'View Publication',
            ]);
        });

        $slides = $slides
            ->sortByDesc('date')
            ->take(5)
            ->values()
            ->map(function ($slide) {
                $title = trim($slide['title']);
                $words = preg_split('/\s+/', $title);
                $midpoint = max(1, (int) ceil(count($words) / 2));
                $slide['line1'] = implode(' ', array_slice($words, 0, $midpoint));
                $slide['line2'] = implode(' ', array_slice($words, $midpoint));

                return (object) $slide;
            });

        return view('pages.index', compact(
            'officialMessages',
            'latestNews',
            'latestTenders',
            'latestCauses',
            'statsComplaintsTotal',
            'statsComplaintsResolved',
            'statsNgosRegistered',
            'statsTrainings',
            'statsAwareness',
            'statsResearch',
            'partners',
            'downloads',
            'slides'
        ));
    }
}
