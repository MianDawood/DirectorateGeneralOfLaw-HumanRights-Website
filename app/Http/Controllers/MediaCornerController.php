<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class MediaCornerController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');
        $perPage = 20;

        $allSubjectOptions = ['General', 'Training & Workshop', 'HR Awareness Session', 'Research & Reporting'];
        $dbSubjects = Event::active()
            ->whereNotNull('subject')
            ->distinct()
            ->pluck('subject')
            ->toArray();
        $subjects = collect(array_unique(array_merge($allSubjectOptions, $dbSubjects)))
            ->sort()
            ->values();

        $news = News::active()
            ->ordered()
            ->get()
            ->map(function ($item) {
                $item->item_type = 'news';
                $item->display_date = $item->published_date;
                return $item;
            });

        $events = Event::active()
            ->with(['images', 'videos'])
            ->withCount(['images', 'videos'])
            ->ordered()
            ->get()
            ->map(function ($item) {
                $item->item_type = 'event';
                $item->display_date = $item->event_date;
                return $item;
            });

        $items = $news->concat($events);

        if ($filter !== 'all') {
            if ($filter === 'news') {
                $items = $items->where('item_type', 'news');
            } else {
                $items = $items->filter(function ($item) use ($filter) {
                    if ($item->item_type !== 'event') return false;
                    $subject = $item->subject ?? '';
                    return stripos($subject, $filter) !== false;
                });
            }
        }

        $items = $items->sortByDesc('display_date')->values();

        $page = Paginator::resolveCurrentPage();
        $total = $items->count();
        $itemsForPage = $items->forPage($page, $perPage);

        $items = new LengthAwarePaginator($itemsForPage, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'query' => $request->query(),
        ]);

        return view('pages.mediacorner', compact('items', 'subjects', 'filter'));
    }
}
