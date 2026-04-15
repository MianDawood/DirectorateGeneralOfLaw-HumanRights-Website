<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class ServicesController extends Controller
{
    public function index()
    {
        $services = $this->dashboardServices();

        return view('pages.dashboard.services', compact('services'));
    }

    private function dashboardServices(): Collection
    {
        return collect([
            [
                'name' => 'Complaint Cell',
                'description' => 'Submit and track complaints related to human rights violations.',
                'route' => 'complaint_cell',
                'management_route' => 'admin.complaints.index',
            ],
            [
                'name' => 'Publications',
                'description' => 'Access official publications, reports, and policy documents.',
                'route' => 'publications',
                'management_route' => 'admin.publications.index',
            ],
            [
                'name' => 'Tenders',
                'description' => 'View and manage current and archived procurement notices.',
                'route' => 'tenders',
                'management_route' => 'admin.tenders.index',
            ],
            [
                'name' => 'NGO Notices',
                'description' => 'Publish and maintain official notices for NGOs.',
                'route' => 'ngo_notices',
                'management_route' => 'admin.ngo-notices.index',
            ],
            [
                'name' => 'Events',
                'description' => 'Manage events displayed in media corner and related pages.',
                'route' => 'mediacorner',
                'management_route' => 'admin.events.index',
            ],
        ])->map(function (array $service, int $index) {
            $service['order'] = $index + 1;
            return $service;
        });
    }
}
