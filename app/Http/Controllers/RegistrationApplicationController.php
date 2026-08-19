<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationApplicationController extends Controller
{
    private const PART_REQUIRED_RULES = [
        1 => [
            'ngoName' => ['required', 'string'],
            'estDate' => ['required', 'date'],
            'district' => ['required', 'string'],
            'headName' => ['required', 'string'],
            'focalName' => ['required', 'string'],
            'type' => ['required', 'array', 'min:1'],
            'hrField' => ['required', 'array', 'min:1'],
        ],
        2 => [
            'headRegisteredAddress' => ['required', 'string'],
            'headPostalAddress' => ['required', 'string'],
            'headMobile' => ['required'],
            'headEmail' => ['required', 'email'],
            'operationalArea' => ['required', 'string'],
        ],
        3 => [
            'generalObjectives' => ['required', 'string'],
            'geographicalFocus' => ['required', 'string'],
            'thematicFocus' => ['required', 'array', 'min:1'],
            'beneficiaries' => ['required', 'array', 'min:1'],
            'operateMethod' => ['required', 'array', 'min:1'],
        ],
        4 => [
            'focalName' => ['required', 'string'],
            'focalDesignation' => ['required', 'string'],
            'focalMobile' => ['required'],
            'focalEmail' => ['required', 'email'],
        ],
        5 => [
            'staffTotal' => ['required', 'numeric'],
            'staffLocal' => ['required', 'numeric'],
            'staffForeigner' => ['required', 'numeric'],
            'staffMale' => ['required', 'numeric'],
            'staffFemale' => ['required', 'numeric'],
            'officeStatus' => ['required'],
            'physicalAssets' => ['required', 'string'],
            'accountTitle' => ['required', 'string'],
            'bankAccountNo' => ['required', 'string'],
            'bankName' => ['required', 'string'],
            'yearlyBudget' => ['required', 'numeric'],
            'sourceFunded' => ['required', 'string'],
            'audited' => ['required'],
            'fundingSource' => ['required', 'string'],
            'legalStatus' => ['required'],
        ],
        6 => [],
        7 => [],
        8 => [
            'ntn' => ['required', 'string'],
            'accountTitle' => ['required', 'string'],
            'accountIban' => ['required', 'string'],
            'accountNumber' => ['required', 'string'],
            'branchAddress' => ['required', 'string'],
        ],
        9 => [
            'fundingSource' => ['required', 'array', 'min:1'],
            'lastAuditDate' => ['required', 'date'],
            'nextAuditDueDate' => ['required', 'date'],
            'recognizedAuditor' => ['required', 'string'],
        ],
        10 => [
            'property_status' => ['required'],
            'property_usage' => ['required'],
            'locationAddress' => ['required', 'string'],
        ],
        11 => [],
    ];

    public function showPart(int $part)
    {
        abort_unless($part >= 1 && $part <= 11, 404);
        return view("pages.registration_form_part{$part}");
    }

    public function savePart(Request $request, int $part)
    {
        abort_unless($part >= 1 && $part <= 11, 404);

        $rules = self::PART_REQUIRED_RULES[$part] ?? [];
        if ($rules) {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please complete all mandatory fields before continuing.',
                    'errors' => $validator->errors(),
                ], 422);
            }
        }

        $payload = $this->normalizeStepPayload($request->except(['_token']), $part);

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

            if ($part === 1) {
                $district = $payload['district'] ?? $payload['localDistrict'] ?? null;
                if ($district) {
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        ['district' => $district, 'updated_at' => now(), 'created_at' => now()]
                    );
                }
            }

            if ($part === 3) {
                $thematicFocus = $payload['thematicFocus'] ?? null;
                if ($thematicFocus && is_array($thematicFocus)) {
                    $thematicAreas = implode(', ', $thematicFocus);
                    if (!empty($payload['thematicFocusOtherText'])) {
                        $thematicAreas .= ', ' . $payload['thematicFocusOtherText'];
                    }
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        ['thematic_areas' => $thematicAreas, 'updated_at' => now(), 'created_at' => now()]
                    );
                }
            }

            // Sync organization_name and establishment_date from Part 1
            if ($part === 1) {
                $orgName = $payload['ngoName'] ?? $payload['orgName'] ?? null;
                $estDate = $payload['estDate'] ?? null;
                if ($orgName || $estDate) {
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        array_filter([
                            'organization_name' => $orgName,
                            'establishment_date' => $estDate,
                            'updated_at' => now(),
                        ])
                    );
                }
            }

            return $applicationId;
        });

        $this->storeUploadedFiles($request, $part, $applicationId, $payload);

        return response()->json([
            'success' => true,
            'application_id' => $applicationId,
            'step' => $part,
            'message' => 'Step saved successfully.',
        ]);
    }

    private function storeUploadedFiles(Request $request, int $part, int $applicationId, array &$payload): void
    {
        $files = $request->allFiles();

        if (empty($files)) {
            return;
        }

        $storedAny = false;

        foreach ($files as $key => $uploaded) {
            $list = is_array($uploaded) ? array_values($uploaded) : [$uploaded];
            $paths = [];

            foreach ($list as $i => $file) {
                if (!$file instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                    continue;
                }

                $original = $file->getClientOriginalName() ?: ($key . ($i > 0 ? '_' . ($i + 1) : ''));
                $safeOriginal = preg_replace('/[^A-Za-z0-9._-]/', '_', $original);
                $name = ($i > 0 ? $key . '_' . ($i + 1) . '_' : '') . $safeOriginal;
                $dir = "registration/app_{$applicationId}/part_{$part}";
                $path = $file->storeAs($dir, $name, 'public');

                if ($path) {
                    $paths[] = $path;
                }
            }

            if ($paths) {
                $payload[$key] = count($paths) === 1 ? $paths[0] : $paths;
                $storedAny = true;
            }
        }

        if ($storedAny) {
            DB::table('ngo_application_step_payloads')
                ->where('application_id', $applicationId)
                ->where('step_no', $part)
                ->update([
                    'payload' => json_encode($payload),
                    'updated_at' => now(),
                ]);
        }
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

    public function registeredNgos(Request $request)
    {
        $perPage = 20;
        $district = $request->input('district');
        $thematicArea = $request->input('thematic_area');

        $query = DB::table('ngo_applications as a')
            ->leftJoin('ngo_profiles as p', 'p.application_id', '=', 'a.id')
            ->leftJoin('ngo_addresses as ad', function ($join) {
                $join->on('ad.application_id', '=', 'a.id')
                     ->where('ad.address_type', '=', 'head_office');
            })
            ->whereIn('a.status', ['submitted', 'under_review', 'approved'])
            ->select([
                'a.id',
                'a.application_no',
                'a.registration_no',
                'a.status',
                'a.submitted_at',
                'a.certificate_issue_date',
                'a.expiry_date',
                'p.organization_name',
                'p.district',
                'p.establishment_date',
                'ad.email as contact_email',
                'ad.telephone as contact_phone',
                'ad.website as contact_website',
                'ad.operational_area',
            ]);

        if ($district) {
            $query->where('p.district', $district);
        }

        $applications = $query->orderByDesc('a.submitted_at')
            ->orderByDesc('a.created_at')
            ->paginate($perPage);

        $districts = DB::table('ngo_profiles')
            ->whereNotNull('district')
            ->where('district', '!=', '')
            ->distinct()
            ->pluck('district')
            ->sort()
            ->values();

        $thematicAreas = [
            'human_rights' => 'Human Rights Protection',
            'legal_aid' => 'Legal Aid & Access to Justice',
            'gender' => 'Gender Equality & Women\'s Rights',
            'child' => 'Child Rights & Protection',
            'disabilities' => 'Rights of Persons with Disabilities',
            'minorities' => 'Transgender & Minority Rights',
            'refugees' => 'Refugee & Migrant Rights',
            'expression' => 'Freedom of Expression & Assembly',
            'labor' => 'Labor & Employment Rights',
            'violence' => 'Protection Against Gender-Based Violence',
        ];

        return view('pages.ngo_registered', compact(
            'applications', 'districts', 'thematicAreas', 'district', 'thematicArea'
        ));
    }

    public function suspendedNgos(Request $request)
    {
        $perPage = 20;
        $district = $request->input('district');

        $query = DB::table('ngo_applications as a')
            ->leftJoin('ngo_profiles as p', 'p.application_id', '=', 'a.id')
            ->where('a.status', 'rejected')
            ->select([
                'a.id',
                'a.application_no',
                'a.registration_no',
                'a.status',
                'a.updated_at',
                'a.review_notes',
                'p.organization_name',
                'p.district',
                'p.establishment_date',
            ]);

        if ($district) {
            $query->where('p.district', $district);
        }

        $applications = $query->orderByDesc('a.updated_at')
            ->orderByDesc('a.created_at')
            ->paginate($perPage);

        $districts = DB::table('ngo_profiles')
            ->whereNotNull('district')
            ->where('district', '!=', '')
            ->distinct()
            ->pluck('district')
            ->sort()
            ->values();

        return view('pages.ngo_suspended', compact('applications', 'districts', 'district'));
    }

    public function show($id)
    {
        $application = DB::table('ngo_applications as a')
            ->leftJoin('ngo_profiles as p', 'p.application_id', '=', 'a.id')
            ->leftJoin('ngo_addresses as ad', function ($join) {
                $join->on('ad.application_id', '=', 'a.id')
                     ->where('ad.address_type', '=', 'head_office');
            })
            ->where('a.id', $id)
            ->select([
                'a.id',
                'a.application_no',
                'a.registration_no',
                'a.status',
                'a.submitted_at',
                'a.certificate_issue_date',
                'a.expiry_date',
                'a.review_notes',
                'p.organization_name',
                'p.district',
                'p.establishment_date',
                'p.general_objectives',
                'p.thematic_areas',
                'ad.email as contact_email',
                'ad.telephone as contact_phone',
                'ad.mobile as contact_mobile',
                'ad.website as contact_website',
                'ad.operational_area',
                'ad.registered_address',
                'ad.postal_address',
            ])
            ->firstOrFail();

        if (empty($application->district)) {
            $step1 = DB::table('ngo_application_step_payloads')
                ->where('application_id', $id)
                ->where('step_no', 1)
                ->first();
            if ($step1) {
                $payload = json_decode($step1->payload, true);
                $application->district = $payload['district'] ?? $payload['localDistrict'] ?? null;
            }
        }

        $beneficiaries = DB::table('ngo_projects')
            ->where('application_id', $id)
            ->sum('beneficiaries_count');

        return view('pages.ngo_detail', compact('application', 'beneficiaries'));
    }

    private function generateApplicationNo(): string
    {
        return 'NGO-' . now()->format('Ymd') . '-' . strtoupper(substr(md5((string) microtime(true)), 0, 6));
    }

    private function normalizeStepPayload(array $payload, int $part): array
    {
        if ($part === 6 && isset($payload['ongoing_projects']) && is_array($payload['ongoing_projects'])) {
            $payload['ongoing_projects'] = array_values(array_filter(
                $payload['ongoing_projects'],
                fn ($row) => is_array($row) && $this->repeatRowHasData($row)
            ));
        }

        if ($part === 7 && isset($payload['planned_projects']) && is_array($payload['planned_projects'])) {
            $payload['planned_projects'] = array_values(array_filter(
                $payload['planned_projects'],
                fn ($row) => is_array($row) && $this->repeatRowHasData($row)
            ));
        }

        return $payload;
    }

    private function repeatRowHasData(array $row): bool
    {
        foreach ($row as $value) {
            if (is_array($value)) {
                continue;
            }
            if (is_string($value) && trim($value) !== '') {
                return true;
            }
            if ($value !== null && $value !== '' && !is_bool($value)) {
                return true;
            }
        }

        return false;
    }
}
