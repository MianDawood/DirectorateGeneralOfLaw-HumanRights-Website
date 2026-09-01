<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixNgoStepPayloads extends Command
{
    protected $signature = 'app:fix-ngo-step-payloads {--app= : Restrict to specific application id}';

    protected $description = 'Rebuild ngo_application_step_payloads into the current 10-step snake_case schema.';

    // Map from an old camelCase key to a target [step, field]. Used by part_X and camel schemes.
    private const MAP = [
        // Step 1
        'ngoName' => [1, 'ngo_name'],
        'estDate' => [1, 'establishment_date'],
        'registration_authority' => [1, 'registration_authority'],
        'part_1_3_registration_authority_1' => [1, 'registration_authority'],
        'regDetails' => [1, 'registration_details'],
        'type' => [1, 'organization_type'],
        'hrField' => [1, 'area_of_interest'],
        'localDistrict' => [1, 'local_districts'],
        'provincial' => [1, 'provincial'],
        'national' => [1, 'national_provinces'],
        'prevAuth' => [1, 'previous_registration_authority'],
        'prevRegNo' => [1, 'previous_registration_no_date'],
        'workDuration' => [1, 'previous_work_duration'],
        'membership' => [1, 'professional_associations'],
        // Step 2
        'headRegisteredAddress' => [2, 'head_registered_address'],
        'headPostalAddress' => [2, 'head_postal_address'],
        'headTelephone' => [2, 'head_telephone'],
        'headMobile' => [2, 'head_mobile'],
        'headFax' => [2, 'head_fax'],
        'headEmail' => [2, 'head_email'],
        'headWebsite' => [2, 'head_website'],
        'headSocialMedia' => [2, 'head_social_media'],
        'liaisonAddress' => [2, 'regional_postal_address'],
        'liaisonTelephone' => [2, 'regional_telephone'],
        'liaisonMobile' => [2, 'regional_mobile'],
        'liaisonFax' => [2, 'regional_fax'],
        'liaisonEmail' => [2, 'regional_email'],
        'liaisonWebsite' => [2, 'regional_website'],
        'liaisonSocialMedia' => [2, 'regional_social_media'],
        'districtAddress' => [2, 'local_field_postal_address'],
        'districtTelephone' => [2, 'local_field_telephone'],
        'districtMobile' => [2, 'local_field_mobile'],
        'districtFax' => [2, 'local_field_fax'],
        'districtEmail' => [2, 'local_field_email'],
        'districtWebsite' => [2, 'local_field_website'],
        'districtSocialMedia' => [2, 'local_field_social_media'],
        'operationalArea' => [2, 'operational_area'],
        // Step 3
        'generalObjectives' => [3, 'general_objectives'],
        'geographicalFocus' => [3, 'geographical_focus'],
        'thematicFocus' => [3, 'thematic_focus'],
        'thematicFocusOther' => [3, 'thematic_focus_other'],
        'thematicFocusOtherText' => [3, 'thematic_focus_other'],
        'beneficiaries' => [3, 'beneficiaries'],
        'beneficiariesOther' => [3, 'beneficiaries_other'],
        'beneficiariesOtherText' => [3, 'beneficiaries_other'],
        'operateMethod' => [3, 'operate_method'],
        'operateMethodOther' => [3, 'operate_method_other'],
        'operateMethodOtherText' => [3, 'operate_method_other'],
        'partnerNGO' => [3, 'partner_ngo_name'],
        'natureCollaboration' => [3, 'nature_of_collaboration'],
        'jointActivities' => [3, 'joint_activities'],
        // Step 4 (employees + head + treasurer + secretary + board)
        'staffTotal' => [4, 'local_employees'],
        'staffLocal' => [4, 'local_employees'],
        'staffForeigner' => [4, 'foreign_employees'],
        'staffMale' => [4, 'local_employees'],
        'staffFemale' => [4, 'local_employees'],
        'staff_total' => [4, 'local_employees'],
        'staff_local' => [4, 'local_employees'],
        'staff_foreigner' => [4, 'foreign_employees'],
        'headName' => [4, 'head_name'],
        'focalName' => [4, 'head_name'],
        // Step 5 completed projects
        'completed_projects_count' => [5, 'total_completed_projects'],
        // Step 6 ongoing
        'ongoing_projects_count' => [6, 'total_ongoing_projects'],
        'total_ongoing_projects' => [6, 'total_ongoing_projects'],
        'project_director' => [6, 'project_director_name'],
        'total_project_cost' => [6, 'total_project_cost'],
        'total_beneficiaries' => [6, 'total_beneficiaries'],
        'scope_of_activities' => [6, 'scope_of_activities'],
        // Step 7 planned
        'planned_projects_count' => [7, 'total_planned_projects'],
        // Step 8 finance
        'ntn' => [8, 'ntn_number'],
        'tax_exemption' => [8, 'tax_exemption_reference'],
        'principal_account_title' => [8, 'principal_account_title'],
        'principal_account_iban' => [8, 'principal_account_iban'],
        'principal_account_number' => [8, 'principal_account_number'],
        'principal_branch_address' => [8, 'principal_branch_address'],
        'other_account_title' => [8, 'other_account_title'],
        'other_account_iban' => [8, 'other_account_iban'],
        'other_account_number' => [8, 'other_account_number'],
        'other_branch_address' => [8, 'other_branch_address'],
        'last_audit_date' => [8, 'last_audit_date'],
        'next_audit_date' => [8, 'next_audit_due_date'],
        'next_audit_due_date' => [8, 'next_audit_due_date'],
        'auditor_name' => [8, 'auditor_name'],
        'audit_objections' => [8, 'audit_objections'],
        'audit_reports' => [8, 'audit_reports'],
        // Step 9 assets
        'vehicle_type' => [9, 'vehicle_type'],
        'vehicle_reg_no' => [9, 'vehicle_registration_number'],
        'vehicle_chassis' => [9, 'vehicle_chassis_number'],
        'vehicle_year' => [9, 'vehicle_year_of_manufacture'],
        'vehicle_model' => [9, 'vehicle_model'],
        'vehicle_make' => [9, 'vehicle_make'],
        'property_status' => [9, 'property_status'],
        'property_address' => [9, 'property_location'],
        'property_usage' => [9, 'property_usage'],
        'property_usage_other' => [9, 'property_usage_other'],
        'lease_agreement' => [9, 'lease_agreement'],
        'acquisition_source' => [9, 'property_acquisition_source'],
        'acquisition_source_other' => [9, 'property_acquisition_source_other'],
        'rental_company_name' => [9, 'rental_company_name'],
        'rental_company_address' => [9, 'rental_company_address'],
        // Step 10 security
        'local_security' => [10, 'local_security'],
        'security_agency_name' => [10, 'local_security'],
        'other_security' => [10, 'other_security'],
        'other_agency_name' => [10, 'other_agency_name'],
        'other_agency_term' => [10, 'other_agency_term'],
        'other_agency_nature' => [10, 'other_agency_nature'],
    ];

    public function handle(): int
    {
        $apps = DB::table('ngo_applications')->pluck('id');
        if ($appFilter = $this->option('app')) {
            $apps = [$appFilter];
        }

        foreach ($apps as $appId) {
            $this->fixApplication((int) $appId);
        }

        $this->info('Done.');
        return self::SUCCESS;
    }

    private function fixApplication(int $appId): void
    {
        $rows = DB::table('ngo_application_step_payloads')
            ->where('application_id', $appId)
            ->orderBy('step_no')
            ->get();

        // Collapse all old steps into a flat, raw value pool keyed by semantic field.
        $fields = []; // field => value
        $repeat = []; // field => array of row arrays

        foreach ($rows as $row) {
            $payload = json_decode($row->payload, true) ?: [];

            foreach ($payload as $key => $value) {
                if ($value === null || $value === '' || $value === []) {
                    continue;
                }
                $this->collect($key, $value, $fields, $repeat, $appId, (int) $row->step_no);
            }
        }

        $built = $this->buildSteps($fields, $repeat);

        // Replace all old rows with rebuilt steps.
        DB::table('ngo_application_step_payloads')
            ->where('application_id', $appId)
            ->delete();

        $now = now();
        foreach ($built as $stepNo => $payload) {
            if (empty($payload)) {
                continue;
            }
            DB::table('ngo_application_step_payloads')->insert([
                'application_id' => $appId,
                'step_no' => $stepNo,
                'payload' => json_encode($payload),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $this->line("  app {$appId}: rebuilt " . count($built) . ' steps');
    }

    private function collect(string $key, $value, array &$fields, array &$repeat, int $appId, int $step): void
    {
        // Repeats by data-field name
        if (in_array($key, ['board_members', 'staff_members', 'other_staff', 'completed_projects', 'ongoing_projects', 'planned_projects', 'security_companies'], true)) {
            $mapped = $this->mapRepeat($key, $value);
            if ($mapped) {
                $repeat[$mapped['group']] = array_merge($repeat[$mapped['group']] ?? [], $mapped['rows']);
            }
            return;
        }

        // sec_company* prefixes -> security_companies repeat
        if (preg_match('/^sec_company(\d+)_(.+)$/', $key, $m)) {
            $idx = (int) $m[1] - 1;
            $col = $this->mapSecColumn($m[2]);
            $repeat['security_companies'][$idx][$col] = $value;
            return;
        }

        // part_X prefixed older keys
        if (preg_match('/^part_\d+_/', $key)) {
            $this->collectPartKey($key, $value, $fields, $repeat);
            return;
        }

        // Direct known camel key
        if (isset(self::MAP[$key])) {
            [$step, $field] = self::MAP[$key];
            $fields[$field] = $value;
            return;
        }

        // Idempotency: already-correct snake_case target keys pass through
        if (isset($this->snakeStepMap()[$key])) {
            $fields[$key] = $value;
            return;
        }

        // Fallback: preserve under extra_data
        $fields['extra_data'][$key] = $value;
    }

    private function collectPartKey(string $key, $value, array &$fields, array &$repeat): void
    {
        // part_6_* / part_8_* / part_9_* / part_10_* - map via targeted rules
        if (preg_match('/^part_6_project_director_name_(1|2)$/', $key)) { $fields['project_director_name'] = $value; return; }
        if (strpos($key, 'part_6_international_donors_3') !== false) { $fields['funding_sources_international_donors'] = $value; return; }
        if (strpos($key, 'part_6_government_depts_4') !== false) { $fields['funding_sources_government'] = $value; return; }
        if (strpos($key, 'part_6_other_sources_5') !== false) { $fields['funding_sources_other'] = $value; return; }
        if (preg_match('/^part_6_human_rights_protection_\d+$/', $key)) { $this->pushUnique($fields, 'project_thematic_focus', $value); return; }
        if (preg_match('/^part_6_children_\d+$/', $key)) { $this->pushUnique($fields, 'beneficiary_types', $value); return; }
        if (strpos($key, 'part_6_total_beneficiaries_count_23') !== false) { $fields['total_beneficiaries'] = $value; return; }
        if (strpos($key, 'part_6_textarea_24') !== false) { $fields['scope_of_activities'] = $value; return; }
        if (preg_match('/^part_6_office_est_clearance_\d+$/', $key)) { $this->pushUnique($fields, 'clearance_permissions', $value); return; }

        if (strpos($key, 'part_8_national_tax_number_ntn_1') !== false) { $fields['ntn_number'] = $value; return; }
        if (strpos($key, 'part_8_tax_exemption_reference') !== false) { $fields['tax_exemption_reference'] = $value; return; }
        if (strpos($key, 'part_8_account_title_3') !== false) { $fields['principal_account_title'] = $value; return; }
        if (strpos($key, 'part_8_account_iban_4') !== false) { $fields['principal_account_iban'] = $value; return; }
        if (strpos($key, 'part_8_account_number_5') !== false) { $fields['principal_account_number'] = $value; return; }
        if (strpos($key, 'part_8_branch_address_6') !== false) { $fields['principal_branch_address'] = $value; return; }
        if (strpos($key, 'part_8_') !== false) { $this->pushUnique($fields, 'extra_data', [$key => $value]); return; }

        if (strpos($key, 'part_9_account_title_1') !== false) { $fields['principal_account_title'] = $value; return; }
        if (strpos($key, 'part_9_account_iban_2') !== false) { $fields['principal_account_iban'] = $value; return; }
        if (strpos($key, 'part_9_account_number_3') !== false) { $fields['principal_account_number'] = $value; return; }
        if (strpos($key, 'part_9_branch_address_4') !== false) { $fields['principal_branch_address'] = $value; return; }
        if (strpos($key, 'part_9_other_specify_5') !== false) { $fields['funding_sources_financial_other'] = $value; return; }
        if (strpos($key, 'part_9_date_of_last_audit_6') !== false) { $fields['last_audit_date'] = $value; return; }
        if (strpos($key, 'part_9_due_date_of_next_audit_7') !== false) { $fields['next_audit_due_date'] = $value; return; }
        if (strpos($key, 'part_9_name_of_recognized_auditor_8') !== false) { $fields['auditor_name'] = $value; return; }
        if (strpos($key, 'part_9_audit_objections_9') !== false) { $fields['audit_objections'] = $value; return; }
        if (strpos($key, 'part_9_file_10') !== false) { $this->pushUnique($fields, 'audit_reports', $value); return; }
        if (strpos($key, 'part_9_') !== false) { $this->pushUnique($fields, 'extra_data', [$key => $value]); return; }

        if (strpos($key, 'part_10_type_of_vehicle_1') !== false) { $fields['vehicle_type'] = $value; return; }
        if (strpos($key, 'part_10_registration_number_2') !== false) { $fields['vehicle_registration_number'] = $value; return; }
        if (strpos($key, 'part_10_chassis_number_3') !== false) { $fields['vehicle_chassis_number'] = $value; return; }
        if (strpos($key, 'part_10_year_of_manufacture_4') !== false) { $fields['vehicle_year_of_manufacture'] = $value; return; }
        if (strpos($key, 'part_10_model_5') !== false) { $fields['vehicle_model'] = $value; return; }
        if (strpos($key, 'part_10_make_6') !== false) { $fields['vehicle_make'] = $value; return; }
        if (strpos($key, 'part_10_other_7') !== false) { $fields['property_usage_other'] = $value; return; }
        if (strpos($key, 'part_10_location_address_8') !== false) { $fields['property_location'] = $value; return; }
        if (strpos($key, 'part_10_name_of_rental_company_10') !== false) { $fields['rental_company_name'] = $value; return; }
        if (strpos($key, 'part_10_company_address_11') !== false) { $fields['rental_company_address'] = $value; return; }
        if (strpos($key, 'part_10_other_9') !== false) { $fields['acquisition_source_other'] = $value; return; }
        if (strpos($key, 'part_10_') !== false) { $this->pushUnique($fields, 'extra_data', [$key => $value]); return; }

        if (strpos($key, 'part_1_') !== false || strpos($key, 'part_2_') !== false || strpos($key, 'part_3_') !== false || strpos($key, 'part_4_') !== false || strpos($key, 'part_5_') !== false || strpos($key, 'part_7_') !== false) {
            $this->pushUnique($fields, 'extra_data', [$key => $value]);
            return;
        }

        $this->pushUnique($fields, 'extra_data', [$key => $value]);
    }

    private function mapRepeat(string $key, $value): ?array
    {
        if (in_array($key, ['board_members', 'other_staff', 'staff_members'], true)) {
            $rows = is_array($value) ? $value : [];
            $mapped = [];
            foreach ($rows as $r) {
                if (!is_array($r)) { continue; }
                $row = [];
                foreach ($r as $k => $v) {
                    $col = match ($k) {
                        'name' => 'staff_name',
                        'date_of_birth' => 'staff_dob',
                        'cnic_number' => 'staff_cnic',
                        'designation' => 'staff_designation',
                        'education' => 'staff_education',
                        'mobile' => 'staff_cell',
                        'residential_address', 'address' => 'staff_domicile',
                        default => $k,
                    };
                    $row[$col] = $v;
                }
                $mapped[] = $row;
            }
            return ['group' => 'staff_members', 'rows' => $mapped];
        }

        if ($key === 'completed_projects') {
            $rows = is_array($value) ? $value : [];
            $mapped = [];
            foreach ($rows as $r) {
                if (!is_array($r)) { continue; }
                $row = [];
                foreach ($r as $k => $v) {
                    $col = match ($k) {
                        'project_name' => 'project_name',
                        'target_area' => 'target_area',
                        'start_date' => 'start_date',
                        'end_date', 'expected_completion_date' => 'end_date',
                        'total_funds' => 'total_funds',
                        'donor', 'funding_source' => 'funding_source',
                        'thematic_focus' => 'thematic_focus',
                        'beneficiaries_count' => 'beneficiaries',
                        default => $k,
                    };
                    $row[$col] = $v;
                }
                $mapped[] = $row;
            }
            return ['group' => 'completed_projects', 'rows' => $mapped];
        }

        if ($key === 'ongoing_projects') {
            $rows = is_array($value) ? $value : [];
            $mapped = [];
            foreach ($rows as $r) {
                if (!is_array($r)) { continue; }
                $row = [];
                foreach ($r as $k => $v) {
                    $col = match ($k) {
                        'project_name' => 'ongoing_project_name',
                        'target_area' => 'ongoing_target_area',
                        'start_date' => 'ongoing_start_date',
                        'end_date', 'expected_completion_date' => 'ongoing_end_date',
                        'total_funds' => 'ongoing_total_funds',
                        'donor', 'funding_source' => 'ongoing_funding_source',
                        'thematic_focus' => 'ongoing_thematic_focus',
                        'beneficiaries_count' => 'ongoing_total_beneficiaries',
                        default => $k,
                    };
                    $row[$col] = $v;
                }
                $mapped[] = $row;
            }
            return ['group' => 'ongoing_projects', 'rows' => $mapped];
        }

        if ($key === 'planned_projects') {
            $rows = is_array($value) ? $value : [];
            $mapped = [];
            foreach ($rows as $r) {
                if (!is_array($r)) { continue; }
                $row = [];
                foreach ($r as $k => $v) {
                    $col = match ($k) {
                        'project_name' => 'planned_project_name',
                        'thematic_focus' => 'planned_thematic_focus',
                        'geographic_focus' => 'planned_geographic_focus',
                        'funding_source', 'donor' => 'planned_funding_source',
                        'beneficiaries', 'beneficiaries_count' => 'planned_beneficiaries',
                        default => $k,
                    };
                    $row[$col] = $v;
                }
                $mapped[] = $row;
            }
            return ['group' => 'planned_projects', 'rows' => $mapped];
        }

        if ($key === 'security_companies') {
            $rows = is_array($value) ? $value : [];
            $mapped = [];
            foreach ($rows as $r) {
                if (!is_array($r)) { continue; }
                $row = [];
                foreach ($r as $k => $v) {
                    $col = $this->mapSecColumn($k);
                    $row[$col] = $v;
                }
                $mapped[] = $row;
            }
            return ['group' => 'security_companies', 'rows' => $mapped];
        }

        return null;
    }

    private function mapSecColumn(string $col): string
    {
        return match ($col) {
            'company_name', 'name', 'agency_name' => 'name',
            'contact', 'contact_person' => 'contact',
            'duration', 'agreement_duration' => 'duration',
            default => $col,
        };
    }

    private function pushUnique(array &$fields, string $key, $value): void
    {
        if (!isset($fields[$key])) {
            $fields[$key] = [];
        }
        if ($key === 'extra_data') {
            // extra_data holds an associative bag of [oldKey => value]
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $fields['extra_data'][$k] = $v;
                }
            }
            return;
        }
        if (is_array($value)) {
            $fields[$key] = array_values(array_unique(array_merge((array) $fields[$key], $value)));
        } elseif (is_string($value) && $value !== '') {
            $fields[$key][] = $value;
        }
    }

    private function snakeStepMap(): array
    {
        return [
            'ngo_name' => 1, 'establishment_date' => 1, 'registration_authority' => 1,
            'registration_details' => 1, 'organization_type' => 1, 'organization_type_other' => 1,
            'area_of_interest' => 1, 'area_of_interest_other' => 1, 'geographical_scope' => 1,
            'local_districts' => 1, 'provincial' => 1, 'national_provinces' => 1,
            'previous_registration_authority' => 1, 'previous_registration_no_date' => 1,
            'previous_work_duration' => 1, 'parent_ngo_name' => 1, 'sister_ngo_name' => 1,
            'security_approval' => 1, 'security_approval_details' => 1,
            'professional_associations' => 1, 'professional_associations_other' => 1,
            'head_registered_address' => 2, 'head_postal_address' => 2, 'head_telephone' => 2,
            'head_mobile' => 2, 'head_fax' => 2, 'head_email' => 2, 'head_website' => 2,
            'head_social_media' => 2, 'regional_postal_address' => 2, 'regional_telephone' => 2,
            'regional_mobile' => 2, 'regional_fax' => 2, 'regional_email' => 2,
            'regional_website' => 2, 'regional_social_media' => 2, 'local_field_postal_address' => 2,
            'local_field_telephone' => 2, 'local_field_mobile' => 2, 'local_field_fax' => 2,
            'local_field_email' => 2, 'local_field_website' => 2, 'local_field_social_media' => 2,
            'operational_area' => 2,
            'general_objectives' => 3, 'geographical_focus' => 3, 'thematic_focus' => 3,
            'thematic_focus_other' => 3, 'beneficiaries' => 3, 'beneficiaries_other' => 3,
            'operate_method' => 3, 'operate_method_other' => 3, 'partner_ngo_name' => 3,
            'nature_of_collaboration' => 3, 'joint_activities' => 3,
            'local_employees' => 4, 'foreign_employees' => 4, 'head_name' => 4,
            'head_designation' => 4, 'head_permanent_address' => 4, 'head_cnic' => 4,
            'head_nationality' => 4,
            'treasurer_name' => 4, 'treasurer_designation' => 4, 'treasurer_cnic' => 4,
            'treasurer_nationality' => 4, 'treasurer_permanent_address' => 4,
            'treasurer_telephone' => 4, 'treasurer_mobile' => 4, 'treasurer_email' => 4,
            'secretary_name' => 4, 'secretary_cnic' => 4, 'secretary_permanent_address' => 4,
            'secretary_nationality' => 4, 'secretary_telephone' => 4, 'secretary_mobile' => 4,
            'secretary_email' => 4,
            'total_completed_projects' => 5,
            'total_ongoing_projects' => 6, 'project_director_name' => 6, 'total_project_cost' => 6,
            'funding_sources' => 6, 'funding_sources_international_donors' => 6,
            'funding_sources_ingos' => 6, 'funding_sources_government' => 6,
            'funding_sources_membership' => 6, 'funding_sources_voluntary' => 6,
            'funding_sources_fundraising' => 6, 'funding_sources_other' => 6,
            'project_thematic_focus' => 6, 'project_thematic_focus_other' => 6,
            'total_beneficiaries' => 6, 'beneficiary_types' => 6, 'beneficiary_types_other' => 6,
            'scope_of_activities' => 6, 'focal_area_key_interventions' => 6,
            'clearance_permissions' => 6,
            'total_planned_projects' => 7,
            'ntn_number' => 8, 'tax_exemption_reference' => 8, 'principal_account_title' => 8,
            'principal_account_iban' => 8, 'principal_account_number' => 8,
            'principal_branch_address' => 8, 'other_account_title' => 8, 'other_account_iban' => 8,
            'other_account_number' => 8, 'other_branch_address' => 8,
            'funding_sources_financial' => 8, 'funding_sources_financial_other' => 8,
            'last_audit_date' => 8, 'auditor_name' => 8, 'audit_objections' => 8,
            'next_audit_due_date' => 8,
            'audit_reports' => 8,
            'vehicle_type' => 9, 'vehicle_registration_number' => 9, 'vehicle_chassis_number' => 9,
            'vehicle_year_of_manufacture' => 9, 'vehicle_model' => 9, 'vehicle_make' => 9,
            'property_status' => 9, 'property_location' => 9, 'property_usage' => 9,
            'property_usage_other' => 9, 'lease_agreement' => 9, 'property_acquisition_source' => 9,
            'property_acquisition_source_other' => 9, 'rental_company_name' => 9,
            'rental_company_address' => 9,
            'local_security' => 10, 'other_security' => 10, 'other_agency_name' => 10,
            'other_agency_term' => 10, 'other_agency_nature' => 10,
        ];
    }

    private function buildSteps(array $fields, array $repeat): array
    {
        $steps = array_fill(1, 10, []);
        $map = $this->snakeStepMap();

        foreach ($fields as $field => $value) {
            if ($field === 'extra_data') {
                $steps[1]['extra_data'] = $value;
                continue;
            }

            $step = $map[$field] ?? null;
            if ($step) {
                $steps[$step][$field] = $value;
            }
        }

        foreach ($repeat as $group => $rows) {
            $step = match ($group) {
                'staff_members' => 4,
                'completed_projects' => 5,
                'ongoing_projects' => 6,
                'planned_projects' => 7,
                'security_companies' => 10,
                default => null,
            };
            if ($step) {
                $steps[$step][$group] = $rows;
            }
        }

        return array_filter($steps, fn ($s) => !empty($s));
    }
}
