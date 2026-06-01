<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Support\CertificateQrGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\URL;

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


        // Generate certificate when newly approved, or approved without a stored PDF yet
        $shouldGenerateCertificate = $data['status'] === 'approved'
            && ($registration_application->status !== 'approved' || empty($registration_application->certificate_path));

        if ($shouldGenerateCertificate) {
            $registration_no = 'KP-DGLHR-' . str_pad($registration_application->id, 3, '0', STR_PAD_LEFT);
            $data['registration_no'] = $registration_no;
            $data['certificate_issue_date'] = now();

            // Get NGO Name from Step 1 payload
            $ngoName = 'Unknown Organization';
            $step1 = DB::table('ngo_application_step_payloads')
                ->where('application_id', $registration_application->id)
                ->where('step_no', 1)
                ->first();
            if ($step1) {
                $payload = json_decode($step1->payload, true);
                $ngoName = $payload['ngoName'] ?? 'Unknown Organization';
            }

            $verifyUrl = URL::route('verify.certificate', ['registration_no' => $registration_no], true);

            $settings = \App\Models\SiteSetting::getSettings();
            $signatureImage = $settings->dg_signature_image ?? null;
            $contactEmail = $settings->contact_email ?? 'dhr.kpk@gmail.com';
            $contactPhone = $settings->contact_phone ?? '0092 91 9217205';
            $contactAddress = $settings->contact_address ?? 'Plot NO. 21, Sector B-2, Phase - V, Hayatabad, Peshawar, Pakistan';

            // Same file as asset('images/logo.jpg') — embedded for reliable DomPDF rendering
            $logoPath = public_path('images/logo.jpg');
            $logoSrc = file_exists($logoPath)
                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath))
                : asset('images/logo.jpg');

            $pdfData = [
                'application' => (object) array_merge($registration_application->toArray(), $data),
                'ngoName' => $ngoName,
                'qrCodeImage' => CertificateQrGenerator::verificationDataUri($verifyUrl),
                'signatureImage' => $signatureImage,
                'logoSrc' => $logoSrc,
                'contactEmail' => $contactEmail,
                'contactPhone' => $contactPhone,
                'contactAddress' => $contactAddress,
            ];

            // After generating QR code and PDF instance
            $pdf = Pdf::loadView('pdf.ngo_certificate', $pdfData)
                // ->setPaper([0, 0, 500, 550], 'portrait')
                ->setPaper('a4', 'portrait')
                ->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'dpi' => 150,
                    'defaultFont' => 'sans-serif',
                    'isPhpEnabled' => false,
                ]);

            // Save PDF to storage
            $pdfContent = $pdf->output();
            $path = 'certificates/ngo_certificate_' . $registration_application->id . '.pdf';
            storage_put($path, $pdfContent);
            $data['certificate_path'] = $path;
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


public function previewCertificate(NgoApplication $registration_application)
{
    // Prepare data exactly like in update(), but without PDF generation
    $ngoName = 'Unknown Organization';
    $step1 = DB::table('ngo_application_step_payloads')
        ->where('application_id', $registration_application->id)
        ->where('step_no', 1)
        ->first();
    if ($step1) {
        $payload = json_decode($step1->payload, true);
        $ngoName = $payload['ngoName'] ?? 'Unknown Organization';
    }

    // Use existing registration_no or generate a temporary one
    $regNo = $registration_application->registration_no ??
             ('KP-DGLHR-' . str_pad($registration_application->id, 3, '0', STR_PAD_LEFT));
    $issueDate = $registration_application->certificate_issue_date ?? now();

    $verifyUrl = URL::route('verify.certificate', ['registration_no' => $regNo], true);

    $settings = \App\Models\SiteSetting::getSettings();
    $signatureImage = $settings->dg_signature_image ?? null;

    $logoPath = public_path('images/logo.jpg');
    $logoSrc = file_exists($logoPath)
        ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath))
        : asset('images/logo.jpg');

    $pdfData = [
        'application' => (object) [
            'registration_no' => $regNo,
            'certificate_issue_date' => $issueDate,
            'id' => $registration_application->id,
            // Add any other needed fields
        ],
        'ngoName' => $ngoName,
        'qrCodeImage' => CertificateQrGenerator::verificationDataUri($verifyUrl),
        'signatureImage' => $signatureImage,
        'logoSrc' => $logoSrc,
    ];

    // Return the same Blade view as HTML (not PDF)
    return view('pdf.ngo_certificate', $pdfData);
}


}
