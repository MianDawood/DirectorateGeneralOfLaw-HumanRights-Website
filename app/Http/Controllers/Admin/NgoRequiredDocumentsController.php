<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoRequiredDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class NgoRequiredDocumentsController extends Controller
{
    /**
     * Display the edit form for NGO Required Documents.
     */
    public function edit(): View
    {
        $documents = NgoRequiredDocument::orderBy('order')->get();
        return view('pages.dashboard.ngo-required-documents.edit', compact('documents'));
    }

    /**
     * Update the NGO Required Documents (bulk).
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'documents' => 'nullable|array',
            'documents.*.name' => 'nullable|string',
            'documents.*.order' => 'nullable|integer',
            'documents.*.is_active' => 'nullable',
            'documents.*.file' => 'nullable|file|max:20480', // Max 20MB
            'deleted_documents' => 'nullable|array',
            'deleted_documents.*' => 'nullable|integer',
        ]);

        // 1. Bulk Delete
        if ($request->has('deleted_documents')) {
            $idsToDelete = $request->input('deleted_documents');
            $docsToDelete = NgoRequiredDocument::whereIn('id', $idsToDelete)->get();
            foreach ($docsToDelete as $doc) {
                if ($doc->file_path && File::exists(public_path($doc->file_path))) {
                    File::delete(public_path($doc->file_path));
                }
                $doc->delete();
            }
        }

        // 2. Create or Update Documents
        if ($request->has('documents')) {
            foreach ($request->input('documents') as $key => $docData) {
                $payload = [
                    'name'      => $docData['name'] ?? 'Untitled Document',
                    'order'     => $docData['order'] ?? 0,
                    'is_active' => isset($docData['is_active']),
                ];

                if (is_numeric($key)) {
                    $document = NgoRequiredDocument::find($key);
                    if ($document) {
                        $document->update($payload);
                    }
                } else {
                    if (!empty($payload['name'])) {
                        $document = NgoRequiredDocument::create($payload);
                    }
                }

                // Handle File Upload
                if (isset($document) && $request->hasFile("documents.{$key}.file")) {
                    // Delete old file
                    if ($document->file_path && File::exists(public_path($document->file_path))) {
                        File::delete(public_path($document->file_path));
                    }

                    $file = $request->file("documents.{$key}.file");
                    $filename = time() . '_doc_' . ($document->id ?? $key) . '.' . $file->getClientOriginalExtension();
                    $uploadPath = public_path('uploads/ngo-documents');
                    
                    if (!File::isDirectory($uploadPath)) {
                        File::makeDirectory($uploadPath, 0755, true);
                    }

                    $file->move($uploadPath, $filename);

                    $document->update([
                        'file_path' => 'uploads/ngo-documents/' . $filename,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.ngo-required-documents.edit')
            ->with('success', 'NGO Required Documents updated successfully.');
    }

    /**
     * Delete a single document asynchronously (AJAX).
     */
    public function destroy(NgoRequiredDocument $document): JsonResponse
    {
        if ($document->file_path && File::exists(public_path($document->file_path))) {
            File::delete(public_path($document->file_path));
        }
        $document->delete();
        return response()->json(['success' => true]);
    }
}