<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemsController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::query()->orderBy('order')->orderBy('id');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $items = $query->paginate(15)->withQueryString();

        return view('pages.dashboard.gallery-items.index', compact('items'));
    }

    public function create()
    {
        return view('pages.dashboard.gallery-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:photo,video',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4|max:20480',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'duration' => 'nullable|string|max:20',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'type',
            'title',
            'description',
            'duration',
            'status',
            'order',
        ]);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('media')) {
            $data['media_path'] = $request->file('media')->store('gallery', 'public');
        }
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = $request->file('thumbnail')->store('gallery', 'public');
        }

        GalleryItem::create($data);

        return redirect()->route('admin.gallery-items.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function show(GalleryItem $gallery_item)
    {
        return view('pages.dashboard.gallery-items.show', ['item' => $gallery_item]);
    }

    public function edit(GalleryItem $gallery_item)
    {
        return view('pages.dashboard.gallery-items.edit', ['item' => $gallery_item]);
    }

    public function update(Request $request, GalleryItem $gallery_item)
    {
        $request->validate([
            'type' => 'required|string|in:photo,video',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4|max:20480',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'duration' => 'nullable|string|max:20',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'type',
            'title',
            'description',
            'duration',
            'status',
            'order',
        ]);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('media')) {
            if ($gallery_item->media_path && Storage::disk('public')->exists($gallery_item->media_path)) {
                Storage::disk('public')->delete($gallery_item->media_path);
            }
            $data['media_path'] = $request->file('media')->store('gallery', 'public');
        }
        if ($request->hasFile('thumbnail')) {
            if ($gallery_item->thumbnail_path && Storage::disk('public')->exists($gallery_item->thumbnail_path)) {
                Storage::disk('public')->delete($gallery_item->thumbnail_path);
            }
            $data['thumbnail_path'] = $request->file('thumbnail')->store('gallery', 'public');
        }

        $gallery_item->update($data);

        return redirect()->route('admin.gallery-items.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $gallery_item)
    {
        if ($gallery_item->media_path && Storage::disk('public')->exists($gallery_item->media_path)) {
            Storage::disk('public')->delete($gallery_item->media_path);
        }
        if ($gallery_item->thumbnail_path && Storage::disk('public')->exists($gallery_item->thumbnail_path)) {
            Storage::disk('public')->delete($gallery_item->thumbnail_path);
        }

        $gallery_item->delete();

        return redirect()->route('admin.gallery-items.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
