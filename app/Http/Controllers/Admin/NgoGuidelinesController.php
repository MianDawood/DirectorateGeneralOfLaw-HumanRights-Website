<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoGuideline;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class NgoGuidelinesController extends Controller
{
    /**
     * Display the edit form for NGO Guidelines.
     */
    public function edit(): View
    {
        $guidelines = NgoGuideline::orderBy('order')->get();
        return view('pages.dashboard.ngo-guidelines.edit', compact('guidelines'));
    }

    /**
     * Update the NGO Guidelines (bulk).
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'guidelines' => 'nullable|array',
            'guidelines.*.title' => 'nullable|string',
            'guidelines.*.description' => 'nullable|string',
            'guidelines.*.order' => 'nullable|integer',
            'guidelines.*.is_active' => 'nullable',
        ]);

        // Create or Update Guidelines
        if ($request->has('guidelines')) {
            foreach ($request->input('guidelines') as $key => $data) {
                $payload = [
                    'title'       => $data['title'] ?? 'Untitled Step',
                    'description' => $data['description'] ?? '',
                    'order'       => $data['order'] ?? 0,
                    'is_active'   => isset($data['is_active']),
                ];

                if (is_numeric($key)) {
                    $guideline = NgoGuideline::find($key);
                    if ($guideline) {
                        $guideline->update($payload);
                    }
                } else {
                    if (!empty($payload['title'])) {
                        NgoGuideline::create($payload);
                    }
                }
            }
        }

        return redirect()
            ->route('admin.ngo-guidelines.edit')
            ->with('success', 'NGO Guidelines updated successfully.');
    }

    /**
     * Delete a single guideline asynchronously (AJAX).
     */
    public function destroy(NgoGuideline $guideline): JsonResponse
    {
        $guideline->delete();
        return response()->json(['success' => true]);
    }
}