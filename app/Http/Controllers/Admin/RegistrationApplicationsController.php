<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationApplicationsController extends Controller
{
    public function index()
    {
        $applications = NgoApplication::query()
            ->where('status', '!=', 'draft')
            ->latest()
            ->paginate(15);

        return view('pages.dashboard.registration-applications.index', compact('applications'));
    }

    public function show(NgoApplication $registration_application)
    {
        $stepPayloads = DB::table('ngo_application_step_payloads')
            ->where('application_id', $registration_application->id)
            ->orderBy('step_no')
            ->get()
            ->map(function ($row) {
                $row->payload = json_decode($row->payload, true) ?: [];
                return $row;
            });

        return view('pages.dashboard.registration-applications.show', [
            'application' => $registration_application,
            'stepPayloads' => $stepPayloads,
        ]);
    }

    public function edit(NgoApplication $registration_application)
    {
        return view('pages.dashboard.registration-applications.edit', [
            'application' => $registration_application,
        ]);
    }

    public function update(Request $request, NgoApplication $registration_application)
    {
        $request->validate([
            'status' => 'required|string|max:30',
            'review_notes' => 'nullable|string',
        ]);

        $data = $request->only(['status', 'review_notes']);
        if ($data['status'] === 'submitted' && !$registration_application->submitted_at) {
            $data['submitted_at'] = now();
        }

        $registration_application->update($data);

        return redirect()
            ->route('admin.registration-applications.index')
            ->with('success', 'Registration application updated successfully.');
    }

    public function destroy(NgoApplication $registration_application)
    {
        $registration_application->delete();

        return redirect()
            ->route('admin.registration-applications.index')
            ->with('success', 'Registration application deleted successfully.');
    }
}
