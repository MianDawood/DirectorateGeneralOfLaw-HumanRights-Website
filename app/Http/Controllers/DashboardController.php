<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\NgoApplication;
use App\Models\OfficialMessage;
use App\Models\Tender;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'registrations' => NgoApplication::query()->where('status', 'submitted')->count(),
            'messages' => OfficialMessage::query()->count(),
            'complaints' => Complaint::query()->count(),
            'tenders' => Tender::query()->count(),
        ];

        return view('pages.dashboard.index', compact('stats'));
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function services()
    {
        return view('pages.dashboard.services');
    }

    public function messages()
    {
        return redirect()->route('admin.official-messages.index');
    }

    public function downloads()
    {
        return view('pages.dashboard.downloads');
    }

    public function causes()
    {
        return redirect()->route('admin.causes.index');
    }
}
