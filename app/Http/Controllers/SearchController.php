<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\Event;
use App\Models\Tender;
use App\Models\Cause;
use App\Models\NgoNotice;
use App\Models\NgoDirective;
use App\Models\NgoGuideline;
use App\Models\NgoRequiredDocument;
use App\Models\OfficialMessage;
use App\Models\Publication;
use App\Models\NgoApplication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->input('query'));

        if (!$query) {
            return view('pages.search-results', [
                'query' => $query,
                'results' => collect(),
            ]);
        }

        $like = "%{$query}%";

        // Search Pages
        $pages = Page::published()
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('content', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Page',
                'title' => $item->title,
                'content' => strip_tags($item->content),
                'url' => route('page.show', $item->slug),
            ]);

        // Search News
        $news = News::active()
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('content', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'News',
                'title' => $item->title,
                'content' => strip_tags($item->content ?? ''),
                'url' => route('news_details', $item->id),
            ]);

        // Search Tenders
        $tenders = Tender::where('status', 'active')
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('reference_no', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Tender',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('tenders'),
            ]);

        // Search Publications
        $publications = Publication::active()
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Publication',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('publications'),
            ]);

        // Search Causes
        $causes = Cause::where('status', 'active')
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Cause',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('causes'),
            ]);

        // Search Events
        $events = Event::active()
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Event',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('mediacorner'),
            ]);

        // Search NGO Notices (Notifications)
        $notices = NgoNotice::where(function ($q) use ($like) {
            $q->where('title', 'like', $like)
                ->orWhere('description', 'like', $like);
        })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Notification',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('ngo_notices'),
            ]);

        // Search NGO Directives (Documents)
        $directives = NgoDirective::where('is_active', true)
            ->where(function ($q) use ($like) {
                $q->where('heading', 'like', $like)
                    ->orWhere('card_1_title', 'like', $like)
                    ->orWhere('card_1_desc', 'like', $like)
                    ->orWhere('card_2_title', 'like', $like)
                    ->orWhere('card_2_desc', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Directive',
                'title' => $item->heading,
                'content' => trim(implode(' ', array_filter([
                    $item->card_1_title, $item->card_1_desc,
                    $item->card_2_title, $item->card_2_desc,
                ]))),
                'url' => route('ngo_directives'),
            ]);

        // Search NGO Guidelines (Documents)
        $guidelines = NgoGuideline::where('is_active', true)
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Guideline',
                'title' => $item->title,
                'content' => $item->description,
                'url' => route('ngo_guidelines'),
            ]);

        // Search NGO Required Documents
        $documents = NgoRequiredDocument::where('is_active', true)
            ->where('name', 'like', $like)
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Document',
                'title' => $item->name,
                'content' => 'Required document for NGO registration',
                'url' => route('ngo_required_documents'),
            ]);

        // Search Official Messages (DG messages)
        $messages = OfficialMessage::active()
            ->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)
                    ->orWhere('position', 'like', $like)
                    ->orWhere('statement', 'like', $like);
            })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'Official Message',
                'title' => $item->name,
                'content' => $item->statement,
                'url' => route('home'),
            ]);

        // Search NGO Applications (NGO Records)
        $ngoRecords = NgoApplication::where(function ($q) use ($like) {
            $q->where('application_no', 'like', $like)
                ->orWhere('registration_no', 'like', $like);
        })
            ->get()
            ->map(fn($item) => (object) [
                'type' => 'NGO Record',
                'title' => $item->registration_no ?: $item->application_no,
                'content' => "Application #{$item->application_no} - Status: {$item->status}",
                'url' => route('ngo_registered'),
            ]);

        // Search Static Pages (hardcoded Blade views)
        $staticPages = [
            [
                'title' => 'Introduction - Directorate of Human Rights',
                'content' => 'About the Directorate of Human Rights Vision Mission Core Values Independence Professionalism Equality Participation Accessibility Accountability Inclusiveness Integrity Pro-activeness Collaboration Government of Khyber Pakhtunkhwa fundamental rights justice equality',
                'url' => route('introduction'),
            ],
            [
                'title' => 'What We Do',
                'content' => 'What We Do Our Mission Directorates of Human Rights Key Activities Services fundamental rights justice dignity 35 Districts 500 Cases 100 Programs Awareness Human Rights Awareness',
                'url' => route('whatwedo'),
            ],
            [
                'title' => 'Resources - Knowledge Archive',
                'content' => 'Knowledge Archive Institutional Registry Reports Publications Obligations Acts & Rules Acts Rules Articles Support Desk Suo Moto record Complaints KP Human Rights Policy Universal Declaration of Human Rights KP Human Rights Act Violence Against Women Rights of Persons with Disability Legal Basis of Human Rights Inequality Girl Education General Issues Domestic Violence Child Rights Child Labor',
                'url' => route('resources'),
            ],
            [
                'title' => 'NGO Checklist & Required Documents',
                'content' => 'Checklist Documents NGO Registration Application Constitution Identity & Governance Identity Governance Financial & Office Financial Office NOCs & Compliance NOCs Compliance NOC District Administration Affidavit No Criminal Record Auditor Report Registration Form Bye-Laws Strategy Paper Objective Document CNIC Cabinet Members General Body Members Police Character Certificates Focal Persons Treasury Challan Registration Fee Bank Account Information Head Office Address Lease Ownership',
                'url' => route('ngo_required_documents'),
            ],
            [
                'title' => 'NGO Mandatory Directives',
                'content' => 'Mandatory Directives Rules Regulations Mandatory Registration Under Rules Late Penalties Closure of Operations Online Registration Portal NGO Khyber Pakhtunkhwa Inquiry Helpline 091-9217205 091-9217203 Working Hours',
                'url' => route('ngo_directives'),
            ],
            [
                'title' => 'NGO Registration Guidelines',
                'content' => 'Registration Guidelines NGO Registration Step-by-step guidelines Khyber Pakhtunkhwa Non-Governmental Organizations Registration Rules Start Online Registration',
                'url' => route('ngo_guidelines'),
            ],
            [
                'title' => 'Media Corner',
                'content' => 'Media Corner Events Media Photo Gallery Video Gallery News Updates',
                'url' => route('mediacorner'),
            ],
            [
                'title' => 'Our Team',
                'content' => 'Our Team Directorate Human Rights Khyber Pakhtunkhwa Staff Members Leadership',
                'url' => route('ourteam'),
            ],
            [
                'title' => 'Contact Us',
                'content' => 'Contact Us Get in Touch Inquiry Complaint Legal Assistance Feedback',
                'url' => route('contact_us'),
            ],
            [
                'title' => 'Complaint Cell',
                'content' => 'Complaint Cell File a Complaint Human Rights Violation Report',
                'url' => route('complaint_cell'),
            ],
            [
                'title' => 'Photo Gallery',
                'content' => 'Photo Gallery Images Events Activities Khyber Pakhtunkhwa',
                'url' => route('photogallery'),
            ],
            [
                'title' => 'Video Gallery',
                'content' => 'Video Gallery Videos Events Documentaries Khyber Pakhtunkhwa',
                'url' => route('videogallery'),
            ],
        ];

        $matchedStaticPages = collect();
        $lowerQuery = strtolower($query);
        foreach ($staticPages as $sp) {
            if (str_contains(strtolower($sp['title']), $lowerQuery) ||
                str_contains(strtolower($sp['content']), $lowerQuery)) {
                $matchedStaticPages->push((object) [
                    'title' => $sp['title'],
                    'type' => 'Page',
                    'content' => $sp['content'],
                    'url' => $sp['url'],
                ]);
            }
        }

        $results = $pages->concat($news)
                        ->concat($tenders)
                        ->concat($publications)
                        ->concat($causes)
                        ->concat($events)
                        ->concat($notices)
                        ->concat($directives)
                        ->concat($guidelines)
                        ->concat($documents)
                        ->concat($messages)
                        ->concat($ngoRecords)
                        ->concat($matchedStaticPages);

        return view('pages.search-results', compact('results', 'query'));
    }
}
