<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\RegistrationApplicationsExport;
use App\Models\NgoApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Support\CertificateQrGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $thematicAreas = $this->thematicAreas();

        $applications = $this->filteredQuery($request)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $districts = $this->districts();

        return view('pages.dashboard.registration-applications.index', compact(
            'applications', 'thematicAreas', 'districts'
        ));
    }

    private function filteredQuery(Request $request)
    {
        $query = NgoApplication::query()
            ->with('profile')
            ->whereIn('status', ['submitted', 'under_review', 'rejected']);

        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('application_no', 'like', "%{$search}%")
                    ->orWhere('registration_no', 'like', "%{$search}%")
                    ->orWhereHas('profile', function ($profile) use ($search) {
                        $profile->where('organization_name', 'like', "%{$search}%");
                    });
            });
        }

        if ($district = trim((string) $request->input('district'))) {
            $query->whereHas('profile', fn ($p) => $p->where('district', $district));
        }

        if ($thematicLabel = $request->input('thematic_area')) {
            $query->whereHas('profile', fn ($p) => $p->where('thematic_areas', 'like', "%{$thematicLabel}%"));
        }

        if ($from = $request->input('date_from')) {
            $query->whereDate('submitted_at', '>=', $from);
        }
        if ($to = $request->input('date_to')) {
            $query->whereDate('submitted_at', '<=', $to);
        }

        return $query;
    }

    public function export(Request $request)
    {
        $applications = $this->filteredQuery($request)->latest()->get();

        $prefix = 'registration_applications_' . now()->format('Y-m-d');

        if ($request->input('format') === 'pdf') {
            $pdf = Pdf::loadView('pdf.registration_applications_report', [
                'applications' => $applications,
                'filters' => $request->only(['search', 'district', 'thematic_area', 'date_from', 'date_to']),
                'generatedAt' => now(),
            ]);

            return $pdf->download($prefix . '.pdf');
        }

        return Excel::download(new RegistrationApplicationsExport($applications), $prefix . '.xlsx');
    }

    public function show(Request $request, NgoApplication $registration_application)
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
            'returnTo' => $this->returnUrl($request),
        ]);
    }

    public function edit(Request $request, NgoApplication $registration_application)
    {
        $registration_application->load('profile');

        return view('pages.dashboard.registration-applications.edit', [
            'application' => $registration_application,
            'returnTo' => $this->returnUrl($request),
        ]);
    }

    private function returnUrl(Request $request): ?string
    {
        $returnTo = $request->input('return_to');

        if (!$returnTo || !is_string($returnTo)) {
            return null;
        }

        $host = parse_url($returnTo, PHP_URL_HOST);

        if ($host && $host !== $request->getHost()) {
            return null;
        }

        return $returnTo;
    }

    public function update(Request $request, NgoApplication $registration_application)
    {
        $request->validate([
            'status' => 'required|string|max:30',
            'review_notes' => 'nullable|string',
            'district' => 'nullable|string|max:255',
            'thematic_areas' => 'nullable|string',
            'expiry_date' => 'nullable|date',
            'suspended_at' => 'nullable|date',
            'suspension_reason' => 'nullable|string',
        ]);

        $data = $request->only(['status', 'review_notes', 'expiry_date']);

        if ($data['status'] === 'suspended') {
            $data['suspended_at'] = $request->input('suspended_at') ?: now()->format('Y-m-d');
            $data['suspension_reason'] = $request->input('suspension_reason');
        } else {
            $data['suspended_at'] = null;
            $data['suspension_reason'] = null;
        }

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
            $ngoName = '';
            $step1 = DB::table('ngo_application_step_payloads')
                ->where('application_id', $registration_application->id)
                ->where('step_no', 1)
                ->first();
            if ($step1) {
                $payload = json_decode($step1->payload, true);
                $ngoName = $payload['ngo_name'] ?? $payload['ngoName'] ?? '';
            }

            $verifyUrl = URL::route('verify.certificate', ['registration_no' => $registration_no], true);

            $settings = \App\Models\SiteSetting::getSettings();
            $signatureImage = $settings->dg_signature_image ?? null;
            $contactEmail = $settings->contact_email ?? '';
            $contactPhone = $settings->contact_phone ?? '';
            $contactAddress = $settings->contact_address ?? '';


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

        // Sync ngo_profiles with district & thematic_areas
        if ($request->filled('district') || $request->filled('thematic_areas')) {
            DB::table('ngo_profiles')->updateOrInsert(
                ['application_id' => $registration_application->id],
                [
                    'district' => $request->input('district'),
                    'thematic_areas' => $request->input('thematic_areas'),
                    'updated_at' => now(),
                ]
            );
        }

        $returnTo = $this->returnUrl($request);

        return $returnTo
            ? redirect($returnTo)->with('success', 'Registration application updated successfully.')
            : redirect()
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
    $ngoName = '';
    $step1 = DB::table('ngo_application_step_payloads')
        ->where('application_id', $registration_application->id)
        ->where('step_no', 1)
        ->first();
    if ($step1) {
        $payload = json_decode($step1->payload, true);
        $ngoName = $payload['ngo_name'] ?? $payload['ngoName'] ?? '';
    }

    // Use existing registration_no or generate a temporary one
    $regNo = $registration_application->registration_no ??
             ('KP-DGLHR-' . str_pad($registration_application->id, 3, '0', STR_PAD_LEFT));
    $issueDate = $registration_application->certificate_issue_date ?? now();

    $verifyUrl = URL::route('verify.certificate', ['registration_no' => $regNo], true);

    $settings = \App\Models\SiteSetting::getSettings();
    $signatureImage = $settings->dg_signature_image ?? null;
    $contactEmail = $settings->contact_email ?? '';
    $contactPhone = $settings->contact_phone ?? '';
    $contactAddress = $settings->contact_address ?? '';

    $logoPath = public_path('images/logo.jpg');
    $logoSrc = file_exists($logoPath)
        ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath))
        : asset('images/logo.jpg');

    $pdfData = [
        'application' => (object) [
            'registration_no' => $regNo,
            'certificate_issue_date' => $issueDate,
            'id' => $registration_application->id,
        ],
        'ngoName' => $ngoName,
        'qrCodeImage' => CertificateQrGenerator::verificationDataUri($verifyUrl),
        'signatureImage' => $signatureImage,
        'logoSrc' => $logoSrc,
        'contactEmail' => $contactEmail,
        'contactPhone' => $contactPhone,
        'contactAddress' => $contactAddress,
    ];

    // Return the same Blade view as HTML (not PDF)
    return view('pdf.ngo_certificate', $pdfData);
}

private function thematicAreas(): array
{
    return [
        'human_rights' => 'Human Rights Protection',
        'legal_aid' => 'Legal Aid & Access to Justice',
        'gender' => "Gender Equality & Women's Rights",
        'child' => 'Child Rights & Protection',
        'disabilities' => 'Rights of Persons with Disabilities',
        'minorities' => 'Transgender & Minority Rights',
        'refugees' => 'Refugee & Migrant Rights',
        'expression' => 'Freedom of Expression & Assembly',
        'labor' => 'Labor & Employment Rights',
        'violence' => 'Protection Against Gender-Based Violence',
    ];
}

private function districts(): array
{
    if (Schema::hasTable('ngo_profiles')) {
        return DB::table('ngo_profiles')
            ->whereNotNull('district')
            ->where('district', '!=', '')
            ->distinct()
            ->orderBy('district')
            ->pluck('district')
            ->all();
    }

    return [];
}


}
