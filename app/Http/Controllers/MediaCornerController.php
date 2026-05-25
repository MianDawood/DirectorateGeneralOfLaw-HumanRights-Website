<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
class MediaCornerController extends Controller
{
    public function index()
    {
        $newsQuery = News::active();
        if (method_exists(News::class, 'scopeOrdered')) {
            $newsQuery->ordered();
        } else {
            $newsQuery->latest();
        }
        $news = $newsQuery->limit(6)->get();

        $events = Event::active()
            ->with(['images', 'videos'])
            ->withCount(['images', 'videos'])
            ->ordered()
            ->get();

        return view('pages.mediacorner', compact('news', 'events'));
    }
}
