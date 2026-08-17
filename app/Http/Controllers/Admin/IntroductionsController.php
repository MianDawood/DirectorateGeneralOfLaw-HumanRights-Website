<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use App\Models\IntroductionHead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class IntroductionsController extends Controller
{
    /**
     * Display the edit form for the Introduction page.
     */
    public function edit(): View
    {
        $introductions = Introduction::orderBy('id')->get();
        $heads = IntroductionHead::orderBy('order')->get();

        return view('pages.dashboard.introductions.edit', compact('introductions', 'heads'));
    }

    /**
     * Update the Introduction page content (sections + heads).
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'introductions' => 'nullable|array',
            'introductions.*.title' => 'nullable|string',
            'introductions.*.description' => 'nullable|string',
            'introductions.*.image' => 'nullable|file',
            'introductions.*.is_active' => 'nullable',
            'heads' => 'nullable|array',
            'heads.*.name' => 'nullable|string',
            'heads.*.role' => 'nullable|string',
            'heads.*.message' => 'nullable|string',
            'heads.*.profile_url' => 'nullable|string',
            'heads.*.order' => 'nullable|integer',
            'heads.*.is_active' => 'nullable',
            'heads.*.image' => 'nullable|file',
            'deleted_heads' => 'nullable|array',
            'deleted_heads.*' => 'nullable|integer',
        ]);

        // --------------------------------------------------------------
        // 1. Handle Introduction Sections
        // --------------------------------------------------------------
        if ($request->has('introductions')) {
            foreach ($request->input('introductions') as $id => $data) {
                $introduction = Introduction::find($id);
                if ($introduction) {
                    $introduction->update([
                        'title' => $data['title'] ?? null,
                        'description' => $data['description'] ?? null,
                        'is_active' => isset($data['is_active']),
                    ]);

                    // Handle image upload
                    if ($request->hasFile("introductions.{$id}.image")) {
                        $this->deleteImage($introduction->image);

                        $file = $request->file("introductions.{$id}.image");
                        $filename = $file->hashName();
                        $file->move(public_path('storage/introductions'), $filename);
                        $introduction->update(['image' => 'introductions/' . $filename]);
                    }
                }
            }
        }

        // --------------------------------------------------------------
        // 2. Delete heads (fallback if not deleted via AJAX)
        // --------------------------------------------------------------
        if ($request->has('deleted_heads')) {
            IntroductionHead::destroy($request->input('deleted_heads'));
        }

        // --------------------------------------------------------------
        // 3. Create or update heads
        // --------------------------------------------------------------
        if ($request->has('heads')) {
            foreach ($request->input('heads') as $key => $headData) {
                $payload = [
                    'name'        => $headData['name'] ?? null,
                    'role'        => $headData['role'] ?? null,
                    'message'     => $headData['message'] ?? null,
                    'profile_url' => $headData['profile_url'] ?? null,
                    'order'       => $headData['order'] ?? 0,
                    'is_active'   => isset($headData['is_active']),
                ];

                if (is_numeric($key)) {
                    $head = IntroductionHead::find($key);
                    if ($head) {
                        $head->update($payload);
                    }
                } else {
                    if (!empty($payload['name']) || !empty($payload['role'])) {
                        $head = IntroductionHead::create($payload);
                    }
                }

                // Handle Image Upload for Head
                if (isset($head) && $request->hasFile("heads.{$key}.image")) {
                    $this->deleteImage($head->image);

                    $file = $request->file("heads.{$key}.image");
                    $filename = $file->hashName();
                    $file->move(public_path('storage/introductions'), $filename);
                    $head->update(['image' => 'introductions/' . $filename]);
                }
            }
        }

        return redirect()
            ->route('admin.introductions.edit')
            ->with('success', 'Introduction page updated successfully.');
    }

    /**
     * Delete a single head asynchronously (AJAX).
     */
    public function destroyHead(IntroductionHead $head): JsonResponse
    {
        $this->deleteImage($head->image);
        $head->delete();
        return response()->json(['success' => true]);
    }

    private function deleteImage(?string $path): void
    {
        if ($path) {
            storage_delete($path);
        }
    }
}
