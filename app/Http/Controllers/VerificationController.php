<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function verifyNgo($registration_no)
    {
        // Find the application by registration number
        $application = DB::table('ngo_applications')
            ->where('registration_no', $registration_no)
            ->where('status', 'approved')
            ->first();

        $ngoName = 'Unknown Organization';
        if ($application) {
            // Get the name from the payload of step 1
            $step1 = DB::table('ngo_application_step_payloads')
                ->where('application_id', $application->id)
                ->where('step_no', 1)
                ->first();

            if ($step1) {
                $payload = json_decode($step1->payload, true);
                $ngoName = $payload['ngoName'] ?? 'Unknown Organization';
            }
        }

        return view('pages.verify_certificate', compact('application', 'registration_no', 'ngoName'));
    }
}
