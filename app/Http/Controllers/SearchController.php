<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\Event;
use App\Models\Tender;
use App\Models\Publication;
use App\Models\Cause;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return view('pages.search-results', [
                'query' => $query,
                'results' => collect(),
            ]);
        }

        // Search Pages
        $pages = Page::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Page';
                $item->url = route('page.show', $item->slug);
                return $item;
            });

        // Search News
        $news = News::active()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'News';
                $item->url = route('news_details', $item->id);
                return $item;
            });

        // Search Tenders
        $tenders = Tender::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Tender';
                $item->url = route('tenders');
                return $item;
            });

        // Search Publications
        $publications = Publication::active()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Publication';
                $item->url = route('publications');
                return $item;
            });

        // Search Causes
        $causes = Cause::where('status', 'active')
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Cause';
                $item->url = route('causes');
                return $item;
            });

        // Search Events
        $events = Event::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Event';
                $item->url = route('mediacorner');
                return $item;
            });

        $results = $pages->concat($news)
                        ->concat($tenders)
                        ->concat($publications)
                        ->concat($causes)
                        ->concat($events);

        return view('pages.search-results', compact('results', 'query'));
    }
}
