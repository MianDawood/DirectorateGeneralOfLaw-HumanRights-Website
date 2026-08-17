<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Publication;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private function typeOf(Request $request): string
    {
        $type = $request->route('type') ?? $request->input('type', 'event');

        return in_array($type, ['event', 'publication'], true) ? $type : 'event';
    }

    public function index(Request $request)
    {
        $categories = Category::ofType($this->typeOf($request))->ordered()->get();

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $type = $this->typeOf($request);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['name'] = trim($validated['name']);

        $exists = Category::ofType($type)
            ->where('name', $validated['name'])
            ->exists();

        if ($exists) {
            return response()->json([
                'errors' => ['name' => ['A category with this name already exists.']],
            ], 422);
        }

        $category = Category::create([
            'name' => $validated['name'],
            'type' => $type,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => true,
        ]);

        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $type = $this->typeOf($request);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['name'] = trim($validated['name']);

        $exists = Category::ofType($type)
            ->where('name', $validated['name'])
            ->where('id', '!=', $category->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'errors' => ['name' => ['A category with this name already exists.']],
            ], 422);
        }

        $oldName = $category->name;

        $category->update([
            'name' => $validated['name'],
            'sort_order' => $validated['sort_order'] ?? $category->sort_order,
            'is_active' => $request->has('is_active') ? (bool) $request->input('is_active') : $category->is_active,
        ]);

        if ($category->wasChanged('name')) {
            if ($type === 'publication') {
                Publication::where('category_id', $category->id)->update(['category' => $category->name]);
            } else {
                Event::where('category_id', $category->id)->update(['subject' => $category->name]);
            }
        }

        return response()->json($category);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return response()->json(['success' => true]);
    }
}