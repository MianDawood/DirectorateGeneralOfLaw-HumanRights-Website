<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function photos()
    {
        $photos = GalleryItem::query()
            ->where('type', 'photo')
            ->where('status', 'active')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('pages.photogallery', compact('photos'));
    }

    public function videos()
    {
        $videos = GalleryItem::query()
            ->where('type', 'video')
            ->where('status', 'active')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('pages.videogallery', compact('videos'));
    }
}
