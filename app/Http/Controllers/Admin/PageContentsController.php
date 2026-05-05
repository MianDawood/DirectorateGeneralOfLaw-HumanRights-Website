<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentsController extends Controller
{
    public function index(Request $request)
    {
        $pageKey = $request->get('page', 'introduction');
        $contents = PageContent::where('page_key', $pageKey)->orderBy('order')->get();
        $pages = $this->getAvailablePages();

        return view('pages.dashboard.page-contents.index', compact('contents', 'pageKey', 'pages'));
    }

    public function create(Request $request)
    {
        $pageKey = $request->get('page', 'introduction');
        $pages = $this->getAvailablePages();
        $sections = $this->getSectionsForPage($pageKey);

        return view('pages.dashboard.page-contents.create', compact('pageKey', 'pages', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_key' => 'required|string',
            'section_key' => 'required|string',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        PageContent::create([
            'page_key' => $request->page_key,
            'section_key' => $request->section_key,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.page-contents.index', ['page' => $request->page_key])
            ->with('success', 'Content created successfully.');
    }

    public function show(PageContent $pageContent)
    {
        return view('pages.dashboard.page-contents.show', compact('pageContent'));
    }

    public function edit(PageContent $pageContent)
    {
        $pages = $this->getAvailablePages();
        $sections = $this->getSectionsForPage($pageContent->page_key);

        return view('pages.dashboard.page-contents.edit', compact('pageContent', 'pages', 'sections'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $request->validate([
            'page_key' => 'required|string',
            'section_key' => 'required|string',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $pageContent->update([
            'page_key' => $request->page_key,
            'section_key' => $request->section_key,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.page-contents.index', ['page' => $request->page_key])
            ->with('success', 'Content updated successfully.');
    }

    public function destroy(PageContent $pageContent)
    {
        $pageKey = $pageContent->page_key;
        $pageContent->delete();

        return redirect()->route('admin.page-contents.index', ['page' => $pageKey])
            ->with('success', 'Content deleted successfully.');
    }

    private function getAvailablePages(): array
    {
        return [
            'introduction' => 'Introduction (Who We Are)',
            'whatwedo' => 'What We Do',
            'ngo_directives' => 'NGO Directives',
            'ngo_guidelines' => 'NGO Guidelines',
            'ngo_notices' => 'NGO Notices',
            'ngo_required_documents' => 'NGO Required Documents',
        ];
    }

    private function getSectionsForPage(string $pageKey): array
    {
        $sections = [
            'introduction' => [
                'hero' => 'Hero Section',
                'vision' => 'Vision',
                'mission' => 'Mission',
                'core_values' => 'Core Values',
                'leadership' => 'Leadership',
                'leader_1' => 'Leader 1 (Minister)',
                'leader_2' => 'Leader 2 (DG)',
                'leader_3' => 'Leader 3 (Director)',
            ],
            'whatwedo' => [
                'hero' => 'Hero Section',
                'mission' => 'Mission Section',
                'activity_1' => 'Activity 1',
                'activity_2' => 'Activity 2',
                'activity_3' => 'Activity 3',
                'activity_4' => 'Activity 4',
                'activity_5' => 'Activity 5',
                'activity_6' => 'Activity 6',
                'impact' => 'Impact Stats',
            ],
            'ngo_directives' => [
                'hero' => 'Hero Section',
                'directive' => 'Mandatory Directive',
                'late_penalty' => 'Late Penalty',
                'closure' => 'Closure Warning',
                'cta' => 'CTA Section',
                'contact' => 'Contact Info',
            ],
            'ngo_guidelines' => [
                'hero' => 'Hero Section',
                'guidelines' => 'Guidelines Content',
            ],
            'ngo_notices' => [
                'hero' => 'Hero Section',
                'notices' => 'Notices List',
            ],
            'ngo_required_documents' => [
                'hero' => 'Hero Section',
                'documents' => 'Required Documents',
            ],
        ];

        return $sections[$pageKey] ?? [];
    }
}