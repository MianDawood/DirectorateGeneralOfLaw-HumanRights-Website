<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::query()
            ->where('status', 'active')
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return view('pages.ourteam', compact('teamMembers'));
    }
}
