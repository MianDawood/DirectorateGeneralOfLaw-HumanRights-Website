<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use App\Models\IntroductionHead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

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
            'introductions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'introductions.*.is_active' => 'nullable',
            'heads' => 'nullable|array',
            'heads.*.name' => 'nullable|string',
            'heads.*.role' => 'nullable|string',
            'heads.*.message' => 'nullable|string',
            'heads.*.profile_url' => 'nullable|string',
            'heads.*.order' => 'nullable|integer',
            'heads.*.is_active' => 'nullable',
            'heads.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
                        if ($introduction->image && File::exists(public_path($introduction->image))) {
                            File::delete(public_path($introduction->image));
                        }

                        $image = $request->file("introductions.{$id}.image");
                        $filename = time() . '_intro_' . $id . '.' . $image->getClientOriginalExtension();
                        $uploadPath = public_path('uploads/introductions');
                        if (!File::isDirectory($uploadPath)) {
                            File::makeDirectory($uploadPath, 0755, true);
                        }
                        $image->move($uploadPath, $filename);
                        $introduction->update(['image' => 'uploads/introductions/' . $filename]);
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
                    if ($head->image && File::exists(public_path($head->image))) {
                        File::delete(public_path($head->image));
                    }

                    $image = $request->file("heads.{$key}.image");
                    $filename = time() . '_head_' . ($head->id ?? $key) . '.' . $image->getClientOriginalExtension();
                    $uploadPath = public_path('uploads/introductions/heads');
                    if (!File::isDirectory($uploadPath)) {
                        File::makeDirectory($uploadPath, 0755, true);
                    }
                    $image->move($uploadPath, $filename);
                    $head->update(['image' => 'uploads/introductions/heads/' . $filename]);
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
        if ($head->image && File::exists(public_path($head->image))) {
            File::delete(public_path($head->image));
        }
        $head->delete();
        return response()->json(['success' => true]);
    }
}