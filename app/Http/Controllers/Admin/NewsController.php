<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create()
    {
        return view('pages.dashboard.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|file|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'file|max:4096',
            'published_date' => 'required|date',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['title', 'excerpt', 'content', 'published_date', 'is_featured', 'is_active', 'order']);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/images'), $filename);
            $data['image_path'] = 'images/' . $filename;
        }

        $news = News::create($data);

        $this->syncImages($news, $request);
        $this->refreshCoverImage($news);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News article created successfully.');
    }

    public function show(News $news)
    {
        $news->load('images');
        return view('pages.dashboard.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $news->load('images');
        return view('pages.dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|file|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'file|max:4096',
            'published_date' => 'required|date',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'integer|exists:news_images,id',
        ]);

        $data = $request->only(['title', 'excerpt', 'content', 'published_date', 'is_featured', 'is_active', 'order']);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($news->image_path && storage_exists($news->image_path)) {
                storage_delete($news->image_path);
            }
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('storage/images'), $filename);
            $data['image_path'] = 'images/' . $filename;
        }

        $news->update($data);

        $this->deleteMarkedImages($news, $request->input('remove_images', []));
        $this->syncImages($news, $request);
        $this->refreshCoverImage($news);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news)
    {
        $this->deleteAllNewsMedia($news);

        $news->delete();

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News article deleted successfully.');
    }

    private function syncImages(News $news, Request $request): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $maxOrder = (int) $news->images()->max('order');

        foreach ($request->file('images') as $index => $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $filename = $file->hashName();
            $file->move(public_path('storage/news/gallery'), $filename);
            $news->images()->create([
                'image_path' => 'news/gallery/' . $filename,
                'order' => $maxOrder + $index + 1,
            ]);
        }
    }

    private function deleteMarkedImages(News $news, array $removeIds): void
    {
        if (empty($removeIds)) {
            return;
        }

        $images = $news->images()->whereIn('id', $removeIds)->get();
        foreach ($images as $image) {
            $this->deleteImageFile($image->image_path);
            $image->delete();
        }
    }

    private function refreshCoverImage(News $news): void
    {
        $news->load('images');
        $first = $news->images->first();

        if ($first) {
            if ($news->image_path && $news->image_path !== $first->image_path) {
                $stillUsed = $news->images()->where('image_path', $news->image_path)->exists();
                if (!$stillUsed) {
                    $this->deleteImageFile($news->image_path);
                }
            }
            $news->update(['image_path' => $first->image_path]);

            return;
        }

        if ($news->image_path) {
            $this->deleteImageFile($news->image_path);
            $news->update(['image_path' => null]);
        }
    }

    private function deleteAllNewsMedia(News $news): void
    {
        $news->load('images');

        foreach ($news->images as $image) {
            $this->deleteImageFile($image->image_path);
            $image->delete();
        }

        if ($news->image_path) {
            $this->deleteImageFile($news->image_path);
        }
    }

    private function deleteImageFile(?string $path): void
    {
        if ($path && storage_exists($path)) {
            storage_delete($path);
        }
    }
}
