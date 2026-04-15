<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationApplicationController extends Controller
{
    public function showPart(int $part)
    {
        abort_unless($part >= 1 && $part <= 11, 404);
        return view("pages.registration_form_part{$part}");
    }

    public function savePart(Request $request, int $part)
    {
        abort_unless($part >= 1 && $part <= 11, 404);

        $payload = $request->except(['_token']);

        $applicationId = DB::transaction(function () use ($request, $part, $payload) {
            $applicationId = $request->input('application_id');
            $application = null;

            if ($applicationId) {
                $application = DB::table('ngo_applications')->where('id', $applicationId)->first();
            }

            if (!$application) {
                $applicationId = DB::table('ngo_applications')->insertGetId([
                    'application_no' => $this->generateApplicationNo(),
                    'status' => 'draft',
                    'current_step' => $part,
                    'created_by' => auth()->id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('ngo_applications')
                    ->where('id', $application->id)
                    ->update([
                        'current_step' => max((int) $application->current_step, $part),
                        'updated_at' => now(),
                    ]);
                $applicationId = $application->id;
            }

            DB::table('ngo_application_step_payloads')->updateOrInsert(
                ['application_id' => $applicationId, 'step_no' => $part],
                ['payload' => json_encode($payload), 'updated_at' => now(), 'created_at' => now()]
            );

            if ($part === 11) {
                DB::table('ngo_applications')
                    ->where('id', $applicationId)
                    ->update([
                        'status' => 'submitted',
                        'submitted_at' => now(),
                        'current_step' => 11,
                        'updated_at' => now(),
                    ]);
            }

            return $applicationId;
        });

        return response()->json([
            'success' => true,
            'application_id' => $applicationId,
            'step' => $part,
            'message' => 'Step saved successfully.',
        ]);
    }

    public function getPartData(Request $request, int $part)
    {
        abort_unless($part >= 1 && $part <= 11, 404);

        $applicationId = $request->query('application_id');
        if (!$applicationId) {
            return response()->json([
                'success' => true,
                'payload' => [],
            ]);
        }

        $row = DB::table('ngo_application_step_payloads')
            ->where('application_id', $applicationId)
            ->where('step_no', $part)
            ->first();

        return response()->json([
            'success' => true,
            'payload' => $row ? (json_decode($row->payload, true) ?: []) : [],
        ]);
    }

    public function registeredNgos()
    {
        $registeredNgos = DB::table('ngo_applications as a')
            ->leftJoin('ngo_profiles as p', 'p.application_id', '=', 'a.id')
            ->whereIn('a.status', ['submitted', 'under_review', 'approved'])
            ->orderByDesc('a.submitted_at')
            ->orderByDesc('a.created_at')
            ->select([
                'a.id',
                'a.application_no',
                'a.status',
                'a.submitted_at',
                'a.created_at',
                'p.organization_name',
                'p.establishment_date',
            ])
            ->get();

        return view('pages.ngo_registered', compact('registeredNgos'));
    }

    public function suspendedNgos()
    {
        $suspendedNgos = DB::table('ngo_applications as a')
            ->leftJoin('ngo_profiles as p', 'p.application_id', '=', 'a.id')
            ->where('a.status', 'rejected')
            ->orderByDesc('a.updated_at')
            ->orderByDesc('a.created_at')
            ->select([
                'a.id',
                'a.application_no',
                'a.status',
                'a.updated_at',
                'a.created_at',
                'p.organization_name',
                'p.establishment_date',
                'a.review_notes',
            ])
            ->get();

        return view('pages.ngo_suspended', compact('suspendedNgos'));
    }

    private function generateApplicationNo(): string
    {
        return 'NGO-' . now()->format('Ymd') . '-' . strtoupper(substr(md5((string) microtime(true)), 0, 6));
    }
}
