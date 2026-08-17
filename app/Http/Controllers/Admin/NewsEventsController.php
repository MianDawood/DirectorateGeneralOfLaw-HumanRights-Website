<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsEventsExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\News;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class NewsEventsController extends Controller
{
    public function index(Request $request)
    {
        [$news, $events] = $this->filteredRows($request);

        $items = $this->mergedSorted($news, $events);

        $perPage = 15;
        $page = LengthAwarePaginator::resolveCurrentPage();
        $slice = $items->slice(($page - 1) * $perPage, $perPage)->values();

        $items = new LengthAwarePaginator(
            $slice,
            $items->count(),
            $perPage,
            $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath(), 'query' => $request->query()]
        );

        $categories = Category::ofType('event')->ordered()->get();

        return view('pages.dashboard.news-events.index', [
            'items' => $items,
            'categories' => $categories,
            'filters' => $this->filterParams($request),
        ]);
    }

    public function export(Request $request)
    {
        [$news, $events] = $this->filteredRows($request);

        $items = $this->mergedSorted($news, $events);

        $prefix = 'news_events_' . now()->format('Y-m-d');

        if ($request->input('format') === 'pdf') {
            $pdf = Pdf::loadView('pdf.news_events_report', [
                'items' => $items,
                'filters' => $this->filterParams($request),
                'generatedAt' => now(),
            ]);

            return $pdf->download($prefix . '.pdf');
        }

        return Excel::download(new NewsEventsExport($items), $prefix . '.xlsx');
    }

    private function filterParams(Request $request): array
    {
        return [
            'type' => $request->input('type', 'all'),
            'category_id' => $request->input('category_id'),
            'search' => trim((string) $request->input('search')),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
        ];
    }

    /**
     * @return array{0: Collection<int, News>, 1: Collection<int, Event>}
     */
    private function filteredRows(Request $request): array
    {
        $params = $this->filterParams($request);
        $search = $params['search'];

        $news = collect();
        $events = collect();

        $categoryFiltered = filled($params['category_id']);

        if (!$categoryFiltered && in_array($params['type'], ['all', 'news'])) {
            $query = News::withCount('images');

            if (filled($params['date_from'])) {
                $query->whereDate('published_date', '>=', $params['date_from']);
            }
            if (filled($params['date_to'])) {
                $query->whereDate('published_date', '<=', $params['date_to']);
            }
            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%");
                });
            }

            $news = $query->orderBy('published_date', 'desc')->get()->map(function (News $item) {
                $item->type = 'news';
                $item->display_date = $item->published_date;

                return $item;
            });
        }

        if ($categoryFiltered || in_array($params['type'], ['all', 'events'])) {
            $query = Event::withCount(['images', 'videos']);

            if ($categoryFiltered) {
                $query->where('category_id', $params['category_id']);
            }
            if (filled($params['date_from'])) {
                $query->whereDate('event_date', '>=', $params['date_from']);
            }
            if (filled($params['date_to'])) {
                $query->whereDate('event_date', '<=', $params['date_to']);
            }
            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('subject', 'like', "%{$search}%");
                });
            }

            $events = $query->orderBy('event_date', 'desc')->get()->map(function (Event $item) {
                $item->type = 'event';
                $item->display_date = $item->event_date;

                return $item;
            });
        }

        return [$news, $events];
    }

    /**
     * @param  Collection<int, News>  $news
     * @param  Collection<int, Event>  $events
     */
    private function mergedSorted(Collection $news, Collection $events): Collection
    {
        return $news->merge($events)
            ->sortByDesc(function ($item) {
                return $item->display_date ? $item->display_date->timestamp : 0;
            })
            ->values();
    }
}