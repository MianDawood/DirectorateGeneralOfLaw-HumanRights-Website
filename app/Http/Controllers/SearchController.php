<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\Event;
use App\Models\Tender;
use App\Models\Publication;
use App\Models\Cause;
use App\Models\NgoNotice;
use App\Models\NgoApplication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return view('pages.search-results', [
                'query' => $query,
                'results' => collect(),
            ]);
        }

        // Search Pages
        $pages = Page::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Page';
                $item->url = route('page.show', $item->slug);
                return $item;
            });

        // Search News
        $news = News::active()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'News';
                $item->url = route('news_details', $item->id);
                return $item;
            });

        // Search Tenders
        $tenders = Tender::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Tender';
                $item->url = route('tenders');
                return $item;
            });

        // Search Publications
        $publications = Publication::active()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Publication';
                $item->url = route('publications');
                return $item;
            });

        // Search Causes
        $causes = Cause::where('status', 'active')
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Cause';
                $item->url = route('causes');
                return $item;
            });

        // Search Events
        $events = Event::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Event';
                $item->url = route('mediacorner');
                return $item;
            });

        // Search NGO Notices (Notifications)
        $notices = NgoNotice::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'Notification';
                $item->url = route('ngo_notices');
                $item->content = $item->description;
                return $item;
            });

        // Search NGO Applications (NGO Records)
        $ngoRecords = NgoApplication::where('application_no', 'like', "%{$query}%")
            ->orWhere('registration_no', 'like', "%{$query}%")
            ->get()
            ->map(function($item) {
                $item->type = 'NGO Record';
                $item->title = $item->registration_no ?: $item->application_no;
                $item->url = route('ngo_registered');
                $item->content = "Application #{$item->application_no} - Status: {$item->status}";
                return $item;
            });

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
                $item = new \stdClass();
                $item->title = $sp['title'];
                $item->type = 'Page';
                $item->content = $sp['content'];
                $item->url = $sp['url'];
                $matchedStaticPages->push($item);
            }
        }

        $results = $pages->concat($news)
                        ->concat($tenders)
                        ->concat($publications)
                        ->concat($causes)
                        ->concat($events)
                        ->concat($notices)
                        ->concat($ngoRecords)
                        ->concat($matchedStaticPages);

        $firstMatch = $results->first();
        if ($firstMatch) {
            return redirect($firstMatch->url);
        }

        return view('pages.search-results', compact('results', 'query'));
    }
}
