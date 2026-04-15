<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMembersController extends Controller
{
    public function index()
    {
        $members = TeamMember::query()
            ->orderBy('order')
            ->orderBy('name')
            ->paginate(15);

        return view('pages.dashboard.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('pages.dashboard.team-members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'position',
            'email',
            'phone',
            'facebook_url',
            'twitter_url',
            'instagram_url',
            'status',
            'order',
        ]);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $team_member)
    {
        return view('pages.dashboard.team-members.show', ['member' => $team_member]);
    }

    public function edit(TeamMember $team_member)
    {
        return view('pages.dashboard.team-members.edit', ['member' => $team_member]);
    }

    public function update(Request $request, TeamMember $team_member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'status' => 'required|string|max:20',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'position',
            'email',
            'phone',
            'facebook_url',
            'twitter_url',
            'instagram_url',
            'status',
            'order',
        ]);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($team_member->image_path && Storage::disk('public')->exists($team_member->image_path)) {
                Storage::disk('public')->delete($team_member->image_path);
            }
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        $team_member->update($data);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team_member)
    {
        if ($team_member->image_path && Storage::disk('public')->exists($team_member->image_path)) {
            Storage::disk('public')->delete($team_member->image_path);
        }

        $team_member->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member deleted successfully.');
    }
}
