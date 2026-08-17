<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationApplicationsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $applicationNo = 'NGO-DEMO-0001';

        DB::table('ngo_applications')->updateOrInsert(
            ['application_no' => $applicationNo],
            [
                'status' => 'submitted',
                'current_step' => 11,
                'submitted_at' => $now,
                'review_notes' => 'Seeded demo application for testing registration workflow.',
                'created_by' => 1,
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        $applicationId = DB::table('ngo_applications')
            ->where('application_no', $applicationNo)
            ->value('id');

        if (!$applicationId) {
            return;
        }

        $stepPayloads = [
            1 => [
                'ngoName' => 'Human Rights Collective KP',
                'estDate' => '2018-03-15',
                'regDetails' => 'REG-2018-334 / Mar 2018',
                'type' => ['societies', 'foundations'],
                'hrField' => ['legal_aid', 'gender', 'minorities'],
                'membership' => ['nhri', 'networks'],
            ],
            2 => [
                'headRegisteredAddress' => 'House 14, Street 7, University Town, Peshawar',
                'headPostalAddress' => 'PO Box 1422, Peshawar GPO',
                'headMobile' => '+92-300-1112233',
                'headEmail' => 'info@hrckp.org',
                'operationalArea' => 'Peshawar, Mardan, Swat, Nowshera',
            ],
            3 => [
                'generalObjectives' => 'Promote access to justice and rights awareness in underserved communities.',
                'thematicFocus' => ['human_rights', 'legal_aid', 'gender'],
                'beneficiaries' => ['women', 'children', 'minorities'],
                'operateMethod' => ['training', 'legal_awareness', 'research'],
            ],
            4 => [
                'focal_person_name' => 'Amina Yousaf',
                'focal_person_designation' => 'Program Manager',
                'focal_person_mobile' => '+92-333-2211000',
                'focal_person_email' => 'amina@hrckp.org',
            ],
            5 => [
                'staff_total' => 22,
                'staff_local' => 22,
                'staff_foreigner' => 0,
                'staff_male' => 9,
                'staff_female' => 13,
                'audited' => 'yes',
                'audit_firm' => 'Khan & Co. Chartered Accountants',
            ],
            6 => [
                'ongoing_projects_count' => 3,
            ],
            7 => [
                'planned_projects_count' => 2,
            ],
            8 => [
                'ntn' => '1234567-8',
                'primary_iban' => 'PK36HABB0000001122334455',
            ],
            9 => [
                'last_audit_date' => '2025-12-31',
                'next_audit_due_date' => '2026-12-31',
                'recognized_auditor' => 'Khan & Co. Chartered Accountants',
            ],
            10 => [
                'movable_assets' => 'One office vehicle and IT equipment',
                'property_status' => 'rented',
            ],
            11 => [
                'local_security' => 'yes',
                'security_agency_name' => 'Safe Guard Services Pvt Ltd',
            ],
        ];

        foreach ($stepPayloads as $stepNo => $payload) {
            DB::table('ngo_application_step_payloads')->updateOrInsert(
                ['application_id' => $applicationId, 'step_no' => $stepNo],
                [
                    'payload' => json_encode($payload),
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }

        DB::table('ngo_profiles')->updateOrInsert(
            ['application_id' => $applicationId],
            [
                'organization_name' => 'Human Rights Collective KP',
                'establishment_date' => '2018-03-15',
                'registration_authority' => 'Directorate General Law & HR',
                'registration_details' => 'REG-2018-334 / Mar 2018',
                'head_name' => 'Dr. Salman Hayat',
                'focal_name' => 'Amina Yousaf',
                'geographical_local' => 'Peshawar, Charsadda',
                'geographical_provincial' => 'Khyber Pakhtunkhwa',
                'geographical_national' => 'Pakistan',
                'previous_authority' => 'Social Welfare Department',
                'previous_reg_no' => 'SWD-443',
                'work_duration_years' => 7,
                'byelaws_status' => 'yes',
                'general_objectives' => 'Promote access to justice and rights awareness in underserved communities.',
                'geographical_focus' => 'Peshawar, Mardan, Swat',
                'collaboration_partner' => 'KP Legal Aid Forum',
                'collaboration_nature' => 'Referral and legal camps',
                'collaboration_activities' => 'Joint legal aid sessions and rights awareness workshops',
                'extra_data' => json_encode(['seed' => true]),
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        $addresses = [
            [
                'address_type' => 'head_office',
                'registered_address' => 'House 14, Street 7, University Town, Peshawar',
                'postal_address' => 'PO Box 1422, Peshawar GPO',
                'telephone' => '091-1234567',
                'mobile' => '+92-300-1112233',
                'fax' => '091-1234999',
                'email' => 'info@hrckp.org',
                'website' => 'https://www.hrckp.org',
                'social_media' => 'https://facebook.com/hrckp',
                'operational_area' => 'Peshawar, Mardan, Swat, Nowshera',
            ],
            [
                'address_type' => 'liaison_office',
                'registered_address' => 'Office 5, Main GT Road, Mardan',
                'postal_address' => null,
                'telephone' => '0937-445566',
                'mobile' => '+92-301-9900112',
                'fax' => null,
                'email' => 'liaison@hrckp.org',
                'website' => null,
                'social_media' => null,
                'operational_area' => null,
            ],
            [
                'address_type' => 'field_office',
                'registered_address' => 'Near Press Club, Mingora, Swat',
                'postal_address' => null,
                'telephone' => '0946-771122',
                'mobile' => '+92-333-4455667',
                'fax' => null,
                'email' => 'swat.office@hrckp.org',
                'website' => null,
                'social_media' => null,
                'operational_area' => null,
            ],
        ];

        DB::table('ngo_addresses')->where('application_id', $applicationId)->delete();
        foreach ($addresses as $address) {
            DB::table('ngo_addresses')->insert(array_merge($address, [
                'application_id' => $applicationId,
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        DB::table('ngo_staff_summaries')->updateOrInsert(
            ['application_id' => $applicationId],
            [
                'total_staff' => 22,
                'local_staff' => 22,
                'foreigner_staff' => 0,
                'male_staff' => 9,
                'female_staff' => 13,
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('ngo_board_members')->where('application_id', $applicationId)->delete();
        DB::table('ngo_board_members')->insert([
            [
                'application_id' => $applicationId,
                'member_order' => 1,
                'name' => 'Dr. Salman Hayat',
                'date_of_birth' => '1978-05-11',
                'nationality_type' => 'local',
                'cnic_number' => '17301-1234567-1',
                'designation' => 'Chairperson',
                'gender' => 'male',
                'residential_address' => 'Hayatabad, Peshawar',
                'mobile' => '+92-333-1111111',
                'telephone' => '091-1111111',
                'fax' => null,
                'email' => 'salman@hrckp.org',
                'education' => 'PhD Law',
                'experience' => '15 years in rights advocacy',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'application_id' => $applicationId,
                'member_order' => 2,
                'name' => 'Amina Yousaf',
                'date_of_birth' => '1988-01-19',
                'nationality_type' => 'local',
                'cnic_number' => '17301-7654321-8',
                'designation' => 'Program Director',
                'gender' => 'female',
                'residential_address' => 'University Town, Peshawar',
                'mobile' => '+92-333-2211000',
                'telephone' => null,
                'fax' => null,
                'email' => 'amina@hrckp.org',
                'education' => 'MS Development Studies',
                'experience' => '10 years in project management',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_focal_contacts')->where('application_id', $applicationId)->delete();
        DB::table('ngo_focal_contacts')->insert([
            'application_id' => $applicationId,
            'name' => 'Amina Yousaf',
            'designation' => 'Program Manager',
            'telephone' => '091-3322110',
            'mobile' => '+92-333-2211000',
            'fax' => null,
            'email' => 'amina@hrckp.org',
            'website' => 'https://www.hrckp.org',
            'social_media' => 'https://linkedin.com/company/hrckp',
            'extra_data' => json_encode(['seed' => true]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('ngo_projects')->where('application_id', $applicationId)->delete();
        DB::table('ngo_projects')->insert([
            [
                'application_id' => $applicationId,
                'project_phase' => 'ongoing',
                'project_order' => 1,
                'project_name' => 'Women Legal Aid Clinics',
                'target_area' => 'Peshawar & Mardan',
                'start_date' => '2025-01-01',
                'expected_completion_date' => '2026-12-31',
                'total_funds' => 2500000,
                'donor' => 'UN Women',
                'thematic_focus' => 'gender',
                'beneficiaries_count' => 1200,
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'application_id' => $applicationId,
                'project_phase' => 'planned',
                'project_order' => 1,
                'project_name' => 'District Rights Awareness Drive',
                'target_area' => 'Swat, Charsadda',
                'start_date' => '2026-07-01',
                'expected_completion_date' => '2027-06-30',
                'total_funds' => 1800000,
                'donor' => 'Provincial Grant',
                'thematic_focus' => 'human_rights',
                'beneficiaries_count' => 3000,
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_tax_details')->updateOrInsert(
            ['application_id' => $applicationId],
            [
                'ntn' => '1234567-8',
                'tax_exemption_reference' => 'EXM-2022-11',
                'audit_firm_name' => 'Khan & Co. Chartered Accountants',
                'audited_status' => 'yes',
                'last_audit_date' => '2025-12-31',
                'next_audit_due_date' => '2026-12-31',
                'recognized_auditor' => 'Khan & Co. Chartered Accountants',
                'audit_objections' => 'No major objections.',
                'funding_sources_text' => 'INGOs, membership fees, public donations',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('ngo_bank_accounts')->where('application_id', $applicationId)->delete();
        DB::table('ngo_bank_accounts')->insert([
            [
                'application_id' => $applicationId,
                'account_scope' => 'primary',
                'account_title' => 'Human Rights Collective KP',
                'iban' => 'PK36HABB0000001122334455',
                'account_number' => '1122334455',
                'bank_name' => 'HBL',
                'branch_address' => 'University Town Branch, Peshawar',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'application_id' => $applicationId,
                'account_scope' => 'secondary',
                'account_title' => 'HRCKP Project Account',
                'iban' => 'PK71HABB0000009988776655',
                'account_number' => '9988776655',
                'bank_name' => 'HBL',
                'branch_address' => 'Mardan Branch',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_assets')->where('application_id', $applicationId)->delete();
        DB::table('ngo_assets')->insert([
            [
                'application_id' => $applicationId,
                'asset_type' => 'vehicle',
                'asset_order' => 1,
                'title' => 'Suzuki APV Van',
                'description' => 'Registration: LEA-8989, Model: 2022, for field activities.',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'application_id' => $applicationId,
                'asset_type' => 'immovable',
                'asset_order' => 1,
                'title' => 'Main Office Premises',
                'description' => 'Rented office at University Town, Peshawar.',
                'extra_data' => json_encode(['property_status' => 'rented', 'seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_security_arrangements')->where('application_id', $applicationId)->delete();
        DB::table('ngo_security_arrangements')->insert([
            [
                'application_id' => $applicationId,
                'arrangement_type' => 'local_security',
                'arrangement_order' => 1,
                'agency_name' => 'Safe Guard Services Pvt Ltd',
                'address' => 'Ring Road, Peshawar',
                'contact_person' => 'Usman Shah',
                'telephone' => '091-7788990',
                'email' => 'ops@safeguard.pk',
                'agreement_duration' => 'Jan 2026 - Dec 2026',
                'nature_of_protection' => 'Night shift guard and emergency response',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_application_documents')->where('application_id', $applicationId)->delete();
        DB::table('ngo_application_documents')->insert([
            [
                'application_id' => $applicationId,
                'document_type' => 'audit_report',
                'file_path' => 'documents/audit-report-2025.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 325000,
                'year_tag' => '2025',
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'application_id' => $applicationId,
                'document_type' => 'bylaws_copy',
                'file_path' => 'documents/bylaws-copy.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 188000,
                'year_tag' => null,
                'extra_data' => json_encode(['seed' => true]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('ngo_application_selections')->where('application_id', $applicationId)->delete();
        $selectionRows = [
            ['selection_group' => 'type', 'selection_value' => 'societies'],
            ['selection_group' => 'type', 'selection_value' => 'foundations'],
            ['selection_group' => 'hrField', 'selection_value' => 'legal_aid'],
            ['selection_group' => 'hrField', 'selection_value' => 'gender'],
            ['selection_group' => 'hrField', 'selection_value' => 'minorities'],
            ['selection_group' => 'membership', 'selection_value' => 'nhri'],
            ['selection_group' => 'membership', 'selection_value' => 'networks'],
            ['selection_group' => 'thematicFocus', 'selection_value' => 'human_rights'],
            ['selection_group' => 'thematicFocus', 'selection_value' => 'legal_aid'],
            ['selection_group' => 'thematicFocus', 'selection_value' => 'gender'],
            ['selection_group' => 'beneficiaries', 'selection_value' => 'women'],
            ['selection_group' => 'beneficiaries', 'selection_value' => 'children'],
            ['selection_group' => 'beneficiaries', 'selection_value' => 'minorities'],
            ['selection_group' => 'operateMethod', 'selection_value' => 'training'],
            ['selection_group' => 'operateMethod', 'selection_value' => 'legal_awareness'],
            ['selection_group' => 'operateMethod', 'selection_value' => 'research'],
        ];

        foreach ($selectionRows as $row) {
            DB::table('ngo_application_selections')->insert([
                'application_id' => $applicationId,
                'selection_group' => $row['selection_group'],
                'selection_value' => $row['selection_value'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
