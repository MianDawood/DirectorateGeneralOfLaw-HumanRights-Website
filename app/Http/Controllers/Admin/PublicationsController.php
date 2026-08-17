<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PublicationsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PublicationsController extends Controller
{
    public function index(Request $request)
    {
        $filters = $this->filterParams($request);

        $query = Publication::ordered();

        if (filled($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }
        if (filled($filters['date_from'])) {
            $query->dateFrom($filters['date_from']);
        }
        if (filled($filters['date_to'])) {
            $query->dateTo($filters['date_to']);
        }

        $publications = $query->paginate(15)->withQueryString();

        $categories = Category::ofType('publication')->ordered()->get();

        return view('pages.dashboard.publications.index', compact('publications', 'categories', 'filters'));
    }

    public function create()
    {
        $categories = Category::ofType('publication')->ordered()->get();

        return view('pages.dashboard.publications.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePublication($request, true);

        $data = $this->publicationAttributes($request, $validated);

        $publication = Publication::create($data);

        if ($request->hasFile('image')) {
            $this->saveImage($request->file('image'), $publication);
        }

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication created successfully.');
    }

    public function show(Publication $publication)
    {
        return view('pages.dashboard.publications.show', compact('publication'));
    }

    public function edit(Publication $publication)
    {
        $categories = Category::ofType('publication')->ordered()->get();

        return view('pages.dashboard.publications.edit', compact('publication', 'categories'));
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $this->validatePublication($request);

        $data = $this->publicationAttributes($request, $validated);

        if ($request->hasFile('file')) {
            if ($publication->file_path && storage_exists($publication->file_path)) {
                storage_delete($publication->file_path);
            }
            $file = $request->file('file');
            $filename = $file->hashName();
            $file->move(public_path('storage/publications'), $filename);
            $data['file_path'] = 'publications/' . $filename;
            $data['file_size'] = $this->formatBytes($file->getSize());
            $data['file_type'] = strtoupper($file->getClientOriginalExtension());
        }

        if ($request->hasFile('image')) {
            $this->deleteImage($publication);
            $this->saveImage($request->file('image'), $publication);
        } elseif ($request->boolean('remove_image') && $publication->image_path) {
            $this->deleteImage($publication);
            $data['image_path'] = null;
        }

        $publication->update($data);

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication updated successfully.');
    }

    public function destroy(Publication $publication)
    {
        $this->deleteImage($publication);

        if ($publication->file_path && storage_exists($publication->file_path)) {
            storage_delete($publication->file_path);
        }

        $publication->delete();

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication deleted successfully.');
    }

    public function export(Request $request)
    {
        $filters = $this->filterParams($request);

        $query = Publication::ordered();

        if (filled($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }
        if (filled($filters['date_from'])) {
            $query->dateFrom($filters['date_from']);
        }
        if (filled($filters['date_to'])) {
            $query->dateTo($filters['date_to']);
        }

        $publications = $query->get();

        $prefix = 'publications_' . now()->format('Y-m-d');

        if ($request->input('format') === 'pdf') {
            $pdf = Pdf::loadView('pdf.publications_report', [
                'publications' => $publications,
                'filters' => $filters,
                'generatedAt' => now(),
            ]);

            return $pdf->download($prefix . '.pdf');
        }

        return Excel::download(new PublicationsExport($publications), $prefix . '.xlsx');
    }

    private function filterParams(Request $request): array
    {
        return [
            'category_id' => $request->input('category_id'),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
        ];
    }

    private function validatePublication(Request $request, bool $requireFile = false): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => ['required', 'integer', \Illuminate\Validation\Rule::exists('categories', 'id')->where('type', 'publication')],
            'file' => $requireFile ? 'required|file|max:10240' : 'nullable|file|max:10240',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp,gif|max:8192',
            'published_date' => 'required|date',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);
    }

    private function publicationAttributes(Request $request, array $validated): array
    {
        $category = Category::find($validated['category_id']);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $category?->name ?? null,
            'category_id' => $validated['category_id'],
            'published_date' => $validated['published_date'],
            'is_active' => $request->boolean('is_active'),
            'order' => $validated['order'] ?? 0,
        ];

        if ($validated['file'] ?? null) {
            $file = $validated['file'];
            $filename = $file->hashName();
            $file->move(public_path('storage/publications'), $filename);
            $data['file_path'] = 'publications/' . $filename;
            $data['file_size'] = $this->formatBytes($file->getSize());
            $data['file_type'] = strtoupper($file->getClientOriginalExtension());
        }

        return $data;
    }

    private function saveImage($file, Publication $publication): void
    {
        $filename = $file->hashName();
        $file->move(public_path('storage/publications'), $filename);
        $publication->update(['image_path' => 'publications/' . $filename]);
    }

    private function deleteImage(Publication $publication): void
    {
        if ($publication->image_path && storage_exists($publication->image_path)) {
            storage_delete($publication->image_path);
        }
    }

    private function formatBytes($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        if ($bytes === 1) {
            return '1 byte';
        }

        return $bytes . ' bytes';
    }
}