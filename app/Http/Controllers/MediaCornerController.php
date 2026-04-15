<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaCornerController extends Controller
{
    public function index()
    {
        // Get latest news using model scope if available, else fallback
        $newsQuery = News::active();
        if (method_exists(News::class, 'scopeOrdered')) {
            $newsQuery->ordered();
        } else {
            $newsQuery->latest();
        }
        $news = $newsQuery->limit(6)->get();
        
        // Get featured active events
        $featuredEvents = Event::featured()
            ->active()
            ->ordered()
            ->limit(4)
            ->get();
            
        // Get recent events (non-featured)
        $recentEvents = Event::active()
            ->where('is_featured', false)
            ->ordered()
            ->limit(4)
            ->get();

        // Get gallery images
        $galleryImages = GalleryItem::where('type', 'photo')
            ->where('status', 'active')
            ->latest()
            ->limit(12)
            ->get();
            
        // Get gallery videos
        $galleryVideos = GalleryItem::where('type', 'video')
            ->where('status', 'active')
            ->latest()
            ->limit(6)
            ->get();

        return view('pages.mediacorner', compact(
            'news', 
            'featuredEvents', 
            'recentEvents', 
            'galleryImages', 
            'galleryVideos'
        ));
    }
}
