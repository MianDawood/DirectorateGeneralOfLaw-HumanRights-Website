<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationApplicationController extends Controller
{
    private const PART_REQUIRED_RULES = [
        1 => [
            'ngo_name' => ['required', 'string'],
            'establishment_date' => ['required', 'date'],
            'registration_authority' => ['required', 'string'],
            'organization_type' => ['required', 'array', 'min:1'],
            'area_of_interest' => ['required', 'array', 'min:1'],
            'geographical_scope' => ['required', 'array', 'min:1'],
        ],
        2 => [
            'head_registered_address' => ['required', 'string'],
            'head_postal_address' => ['required', 'string'],
            'head_mobile' => ['required'],
            'head_fax' => ['required'],
            'head_email' => ['required', 'email'],
            'regional_postal_address' => ['required', 'string'],
            'regional_mobile' => ['required'],
            'regional_fax' => ['required'],
            'regional_email' => ['required', 'email'],
            'local_field_mobile' => ['required'],
            'local_field_fax' => ['required'],
            'local_field_email' => ['required', 'email'],
        ],
        3 => [
            'general_objectives' => ['required', 'string'],
            'geographical_focus' => ['required', 'string'],
            'thematic_focus' => ['required', 'array', 'min:1'],
            'beneficiaries' => ['required', 'array', 'min:1'],
            'operate_method' => ['required', 'array', 'min:1'],
        ],
        4 => [
            'local_employees' => ['required', 'numeric'],
            'head_name' => ['required', 'string'],
            'head_designation' => ['required', 'string'],
            'head_permanent_address' => ['required', 'string'],
            'head_cnic' => ['required', 'string'],
            'head_nationality' => ['required', 'string'],
            'head_mobile' => ['required'],
            'head_email' => ['required', 'email'],
            'treasurer_name' => ['required', 'string'],
            'treasurer_designation' => ['required', 'string'],
            'treasurer_cnic' => ['required', 'string'],
            'treasurer_nationality' => ['required', 'string'],
            'treasurer_permanent_address' => ['required', 'string'],
            'treasurer_mobile' => ['required'],
            'treasurer_email' => ['required', 'email'],
            'secretary_name' => ['required', 'string'],
            'secretary_cnic' => ['required', 'string'],
            'secretary_permanent_address' => ['required', 'string'],
            'secretary_nationality' => ['required', 'string'],
            'secretary_mobile' => ['required'],
            'secretary_email' => ['required', 'email'],
            'staff_members' => ['required', 'array', 'min:1'],
            'staff_members.*.staff_name' => ['required', 'string'],
            'staff_members.*.staff_designation' => ['required', 'string'],
            'staff_members.*.staff_dob' => ['required'],
            'staff_members.*.staff_cell' => ['required'],
            'staff_members.*.staff_cnic' => ['required', 'string'],
        ],
        5 => [
            'total_completed_projects' => ['required', 'numeric'],
            'completed_projects' => ['required', 'array', 'min:1'],
            'completed_projects.*.project_name' => ['required', 'string'],
            'completed_projects.*.target_area' => ['required', 'string'],
            'completed_projects.*.start_date' => ['required'],
            'completed_projects.*.end_date' => ['required'],
            'completed_projects.*.total_funds' => ['required'],
            'completed_projects.*.funding_source' => ['required', 'string'],
            'completed_projects.*.thematic_focus' => ['required', 'string'],
            'completed_projects.*.beneficiaries' => ['required'],
        ],
        6 => [
            'total_ongoing_projects' => ['required', 'numeric'],
            'project_director_name' => ['required', 'string'],
            'total_project_cost' => ['required'],
            'total_beneficiaries' => ['required', 'numeric'],
            'ongoing_projects' => ['required', 'array', 'min:1'],
            'ongoing_projects.*.ongoing_project_name' => ['required', 'string'],
            'ongoing_projects.*.ongoing_target_area' => ['required', 'string'],
            'ongoing_projects.*.ongoing_start_date' => ['required'],
            'ongoing_projects.*.ongoing_end_date' => ['required'],
            'ongoing_projects.*.ongoing_total_funds' => ['required'],
            'ongoing_projects.*.ongoing_funding_source' => ['required', 'string'],
            'ongoing_projects.*.ongoing_thematic_focus' => ['required', 'string'],
            'ongoing_projects.*.ongoing_total_beneficiaries' => ['required'],
        ],
        7 => [
            'total_planned_projects' => ['required', 'numeric'],
            'planned_projects' => ['required', 'array', 'min:1'],
            'planned_projects.*.planned_project_name' => ['required', 'string'],
            'planned_projects.*.planned_thematic_focus' => ['required', 'string'],
            'planned_projects.*.planned_geographic_focus' => ['required', 'string'],
            'planned_projects.*.planned_funding_source' => ['required', 'string'],
            'planned_projects.*.planned_beneficiaries' => ['required'],
        ],
        8 => [
            'ntn_number' => ['required', 'string'],
            'principal_account_title' => ['required', 'string'],
            'principal_account_iban' => ['required', 'string'],
            'principal_account_number' => ['required', 'string'],
            'principal_branch_address' => ['required', 'string'],
            'funding_sources_financial' => ['required', 'array', 'min:1'],
            'last_audit_date' => ['required', 'date'],
            'auditor_name' => ['required', 'string'],
            'next_audit_due_date' => ['required', 'date'],
        ],
        9 => [],
        10 => [],
    ];

    public function showPart(int $part)
    {
        abort_unless($part >= 1 && $part <= 10, 404);
        return view("pages.registration_form_part{$part}");
    }

    public function savePart(Request $request, int $part)
    {
        abort_unless($part >= 1 && $part <= 10, 404);

        $payload = $this->normalizeStepPayload($request->except(['_token']), $part);

        $rules = self::PART_REQUIRED_RULES[$part] ?? [];
        if ($rules && !$request->boolean('draft')) {
            $validator = Validator::make($payload, $rules);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please complete all mandatory fields before continuing.',
                    'errors' => $validator->errors(),
                ], 422);
            }
        }

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

            if ($part === 10) {
                DB::table('ngo_applications')
                    ->where('id', $applicationId)
                    ->update([
                        'status' => 'submitted',
                        'submitted_at' => now(),
                        'current_step' => 10,
                        'updated_at' => now(),
                    ]);
            }

            if ($part === 1) {
                $profileData = array_filter([
                    'organization_name' => $payload['ngo_name'] ?? null,
                    'establishment_date' => $payload['establishment_date'] ?? null,
                    'registration_authority' => $payload['registration_authority'] ?? null,
                    'registration_details' => $payload['registration_details'] ?? null,
                    'organization_type' => isset($payload['organization_type']) && is_array($payload['organization_type'])
                        ? json_encode(array_values($payload['organization_type'])) : null,
                    'area_of_interest' => isset($payload['area_of_interest']) && is_array($payload['area_of_interest'])
                        ? json_encode(array_values($payload['area_of_interest'])) : null,
                    'local_districts' => $payload['local_districts'] ?? null,
                    'national_provinces' => $payload['national_provinces'] ?? null,
                    'previous_authority' => $payload['previous_registration_authority'] ?? null,
                    'previous_reg_no' => $payload['previous_registration_no_date'] ?? null,
                    'work_duration_years' => $payload['previous_work_duration'] ?? null,
                    'parent_ngo_name' => $payload['parent_ngo_name'] ?? null,
                    'sister_ngo_name' => $payload['sister_ngo_name'] ?? null,
                    'security_approval' => $payload['security_approval'] ?? null,
                    'security_approval_details' => $payload['security_approval_details'] ?? null,
                    'professional_associations' => isset($payload['professional_associations']) && is_array($payload['professional_associations'])
                        ? json_encode(array_values($payload['professional_associations'])) : null,
                    'district' => $this->deriveDistrict($payload),
                    'updated_at' => now(),
                ], fn ($value) => $value !== null);

                if ($profileData) {
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        $profileData
                    );
                }
            }

            if ($part === 3) {
                $thematicFocus = $payload['thematic_focus'] ?? null;
                $thematicAreas = [];
                if (is_array($thematicFocus)) {
                    $thematicAreas = array_merge($thematicAreas, $thematicFocus);
                }
                if (!empty($payload['thematic_focus_other'])) {
                    $thematicAreas[] = $payload['thematic_focus_other'];
                }

                $profileData = array_filter([
                    'general_objectives' => $payload['general_objectives'] ?? null,
                    'geographical_focus' => $payload['geographical_focus'] ?? null,
                    'collaboration_partner' => $payload['partner_ngo_name'] ?? null,
                    'collaboration_nature' => $payload['nature_of_collaboration'] ?? null,
                    'collaboration_activities' => $payload['joint_activities'] ?? null,
                    'thematic_areas' => $thematicAreas ? implode(', ', array_unique($thematicAreas)) : null,
                    'updated_at' => now(),
                ], fn ($value) => $value !== null);

                if ($profileData) {
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        $profileData
                    );
                }
            }

            if ($part === 4) {
                $profileData = array_filter([
                    'head_name' => $payload['head_name'] ?? null,
                    'updated_at' => now(),
                ], fn ($value) => $value !== null);

                if ($profileData) {
                    DB::table('ngo_profiles')->updateOrInsert(
                        ['application_id' => $applicationId],
                        $profileData
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
        abort_unless($part >= 1 && $part <= 10, 404);

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
                $application->district = $payload['district'] ?? $payload['localDistrict'] ?? $payload['local_districts'] ?? null;
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
        if ($part === 4 && isset($payload['staff_members']) && is_array($payload['staff_members'])) {
            $payload['staff_members'] = array_values(array_filter(
                $payload['staff_members'],
                fn ($row) => is_array($row) && $this->repeatRowHasData($row)
            ));
        }

        if ($part === 5 && isset($payload['completed_projects']) && is_array($payload['completed_projects'])) {
            $payload['completed_projects'] = array_values(array_filter(
                $payload['completed_projects'],
                fn ($row) => is_array($row) && $this->repeatRowHasData($row)
            ));
        }

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

    private function deriveDistrict(array $payload): ?string
    {
        $localDistricts = $payload['local_districts'] ?? null;
        if (is_string($localDistricts) && trim($localDistricts) !== '') {
            $tokens = preg_split('/[,;\n]/', $localDistricts);
            foreach ($tokens as $token) {
                $trimmed = trim($token);
                if ($trimmed !== '') {
                    return $trimmed;
                }
            }
        }

        return null;
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
