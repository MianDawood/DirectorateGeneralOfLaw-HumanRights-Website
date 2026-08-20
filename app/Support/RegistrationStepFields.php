<?php

namespace App\Support;

class RegistrationStepFields
{
    /**
     * Per-step metadata and field definitions matching the public registration
     * forms (10 steps). Field labels mirror the static labels used in the
     * frontend blade templates so the dashboard can display them identically.
     */
    public static function steps(): array
    {
        return [
            1 => [
                'title' => 'PART-1: GENERAL INFORMATION',
                'sections' => [
                    [
                        'title' => 'General Information',
                        'fields' => [
                            'ngo_name' => 'Name of Non-Governmental Organization',
                            'establishment_date' => 'Date of Establishment',
                            'registration_authority' => 'Registration Authority: Directorate General, Law & Human Rights',
                            'registration_details' => 'Registration No. and Date (If applicable)',
                            'organization_type' => 'Type of Non-Governmental Organization',
                            'organization_type_other' => 'Organization Type - Other',
                        ],
                    ],
                    [
                        'title' => 'Area of Interest / Sector',
                        'fields' => [
                            'area_of_interest' => 'Area of Interest / Sector (Only Human Rights Related Sectors Allowed)',
                            'area_of_interest_other' => 'Area of Interest - Other',
                        ],
                    ],
                    [
                        'title' => 'Geographical Scope of Operations',
                        'fields' => [
                            'geographical_scope' => 'Geographical Scope of Operations',
                            'local_districts' => 'Local (Specify Districts)',
                            'provincial' => 'Provincial',
                            'national_provinces' => 'National (Specify Provinces)',
                        ],
                    ],
                    [
                        'title' => 'Previous Registration Details (if applicable)',
                        'fields' => [
                            'previous_registration_authority' => 'Previous Registration Authority',
                            'previous_registration_no_date' => 'Registration No. & Date',
                            'previous_work_duration' => 'Duration of Work (years)',
                        ],
                    ],
                    [
                        'title' => 'Parent and Sister Non-Governmental Organizations',
                        'fields' => [
                            'parent_ngo_name' => 'Name of Parent Non-Governmental Organization (if any)',
                            'sister_ngo_name' => 'Name of Sister Non-Governmental Organization (if any)',
                        ],
                    ],
                    [
                        'title' => 'Security Approval',
                        'fields' => [
                            'security_approval' => 'Security Approval (if any)',
                            'security_approval_details' => 'Security Approval - Details',
                        ],
                    ],
                    [
                        'title' => 'Professional Associations / Membership',
                        'fields' => [
                            'professional_associations' => 'Professional Associations / Membership',
                            'professional_associations_other' => 'Professional Associations - Other',
                        ],
                    ],
                ],
                'repeat' => [],
                'files' => [],
            ],
            2 => [
                'title' => 'PART-2: ADDRESS INFORMATION',
                'sections' => [
                    [
                        'title' => 'Head Office',
                        'fields' => [
                            'head_registered_address' => 'Registered Address',
                            'head_postal_address' => 'Postal Address',
                            'head_telephone' => 'Telephone',
                            'head_mobile' => 'Mobile (Official)',
                            'head_fax' => 'Fax',
                            'head_email' => 'Email ID',
                            'head_website' => 'Official Website',
                            'head_social_media' => 'Other Social Media',
                        ],
                    ],
                    [
                        'title' => 'Regional Offices',
                        'fields' => [
                            'regional_postal_address' => 'Postal Address',
                            'regional_telephone' => 'Telephone',
                            'regional_mobile' => 'Mobile (Official)',
                            'regional_fax' => 'Fax',
                            'regional_email' => 'Email ID',
                            'regional_website' => 'Official Website',
                            'regional_social_media' => 'Other Social Media',
                        ],
                    ],
                    [
                        'title' => 'Local / Field Offices',
                        'fields' => [
                            'local_field_postal_address' => 'Postal Addresses',
                            'local_field_telephone' => 'Telephone',
                            'local_field_mobile' => 'Mobile (Official)',
                            'local_field_fax' => 'Fax',
                            'local_field_email' => 'Email ID',
                            'local_field_website' => 'Official Website',
                            'local_field_social_media' => 'Other Social Media',
                        ],
                    ],
                ],
                'repeat' => [],
                'files' => [],
            ],
            3 => [
                'title' => 'PART-3: OBJECTIVES',
                'sections' => [
                    [
                        'title' => 'General Objectives',
                        'fields' => [
                            'general_objectives' => 'General Objectives',
                            'geographical_focus' => 'Geographical Focus of Work (Specify District in Khyber Pakhtunkhwa)',
                        ],
                    ],
                    [
                        'title' => 'Thematic Focus',
                        'fields' => [
                            'thematic_focus' => 'Thematic Focus',
                            'thematic_focus_other' => 'Thematic Focus - Other',
                        ],
                    ],
                    [
                        'title' => 'Beneficiaries (Target Groups)',
                        'fields' => [
                            'beneficiaries' => 'Beneficiaries (Target Groups)',
                            'beneficiaries_other' => 'Beneficiaries - Other',
                        ],
                    ],
                    [
                        'title' => 'How Does Your Non-Governmental Organization Operate?',
                        'fields' => [
                            'operate_method' => 'How Does Your Non-Governmental Organization Operate?',
                            'operate_method_other' => 'Operate Method - Other',
                        ],
                    ],
                    [
                        'title' => 'Collaboration with Local NGOs / Non-Profit Organizations',
                        'fields' => [
                            'partner_ngo_name' => 'Name of Partner Non-Governmental Organization',
                            'nature_of_collaboration' => 'Nature of Collaboration',
                            'joint_activities' => 'Joint Activities',
                        ],
                    ],
                ],
                'repeat' => [],
                'files' => [],
            ],
            4 => [
                'title' => 'PART-4: MANAGEMENT & STAFF',
                'sections' => [
                    [
                        'title' => 'Total Number of Employees',
                        'fields' => [
                            'local_employees' => 'Local Employees',
                            'foreign_employees' => 'Foreign Employees (if applicable)',
                        ],
                    ],
                    [
                        'title' => 'Head of the Non-Governmental Organization / Chief Administrator',
                        'fields' => [
                            'head_name' => 'Head - Name',
                            'head_designation' => 'Head - Designation',
                            'head_permanent_address' => 'Head - Permanent Address',
                            'head_cnic' => 'Head - CNIC No.',
                            'head_nationality' => 'Head - Nationality',
                            'head_telephone' => 'Head - Telephone No.',
                            'head_mobile' => 'Head - Mobile No.',
                            'head_email' => 'Head - Email',
                        ],
                    ],
                    [
                        'title' => 'Treasurer / Accountant',
                        'fields' => [
                            'treasurer_name' => 'Treasurer - Name',
                            'treasurer_designation' => 'Treasurer - Designation',
                            'treasurer_cnic' => 'Treasurer - CNIC No.',
                            'treasurer_nationality' => 'Treasurer - Nationality',
                            'treasurer_permanent_address' => 'Treasurer - Permanent Address',
                            'treasurer_telephone' => 'Treasurer - Telephone No.',
                            'treasurer_mobile' => 'Treasurer - Mobile No.',
                            'treasurer_email' => 'Treasurer - Email',
                        ],
                    ],
                    [
                        'title' => 'Secretary',
                        'fields' => [
                            'secretary_name' => 'Secretary - Name',
                            'secretary_cnic' => 'Secretary - CNIC No.',
                            'secretary_permanent_address' => 'Secretary - Permanent Address',
                            'secretary_nationality' => 'Secretary - Nationality',
                            'secretary_telephone' => 'Secretary - Telephone No.',
                            'secretary_mobile' => 'Secretary - Mobile No.',
                            'secretary_email' => 'Secretary - Email',
                        ],
                    ],
                ],
                'repeat' => [
                    'staff_members' => [
                        'label' => 'Other Staff Members',
                        'columns' => [
                            'staff_name' => 'Name of Employee',
                            'staff_designation' => 'Designation',
                            'staff_dob' => 'Date of Birth',
                            'staff_education' => 'Education',
                            'staff_cell' => 'Cell No.',
                            'staff_domicile' => 'Domicile',
                            'staff_cnic' => 'CNIC No.',
                        ],
                    ],
                ],
                'files' => [],
            ],
            5 => [
                'title' => 'PART-5: PROJECTS / PROGRAMMES / ASSIGNMENTS COMPLETED',
                'sections' => [
                    [
                        'title' => 'Projects / Programmes / Assignments Completed',
                        'fields' => [
                            'total_completed_projects' => 'Total Number of Completed Projects',
                        ],
                    ],
                ],
                'repeat' => [
                    'completed_projects' => [
                        'label' => 'Completed Project Details',
                        'columns' => [
                            'project_name' => 'Project Name',
                            'target_area' => 'Target Area (District/City/Town/UC)',
                            'start_date' => 'Start Date (MM/YYYY)',
                            'end_date' => 'End Date (MM/YYYY)',
                            'total_funds' => 'Total Funds (PKR/USD)',
                            'funding_source' => 'Funding Source / Donor',
                            'thematic_focus' => 'Thematic Focus',
                            'beneficiaries' => 'Total Beneficiaries',
                        ],
                    ],
                ],
                'files' => [],
            ],
            6 => [
                'title' => 'PART-6: PROJECTS / PROGRAMMES / ASSIGNMENTS UNDER IMPLEMENTATION',
                'sections' => [
                    [
                        'title' => 'Projects / Programmes / Assignments Under Implementation',
                        'fields' => [
                            'total_ongoing_projects' => 'Number of Ongoing Projects/Programmes/Assignments',
                        ],
                    ],
                    [
                        'title' => 'Project Director / Team Leader',
                        'fields' => [
                            'project_director_name' => 'Project Director / Team Leader Name',
                            'total_project_cost' => 'Total Project Cost',
                        ],
                    ],
                    [
                        'title' => 'Funding Source',
                        'fields' => [
                            'funding_sources' => 'Funding Source',
                            'funding_sources_international_donors' => 'International Donors (Specify)',
                            'funding_sources_ingos' => 'INGOs (Specify)',
                            'funding_sources_government' => 'Government (Specify Department)',
                            'funding_sources_membership' => 'Membership Contributions (Specify)',
                            'funding_sources_voluntary' => 'Voluntary Donations (Specify)',
                            'funding_sources_fundraising' => 'Fundraising (Specify)',
                            'funding_sources_other' => 'Other (Specify)',
                        ],
                    ],
                    [
                        'title' => 'Thematic Focus',
                        'fields' => [
                            'project_thematic_focus' => 'Thematic Focus',
                            'project_thematic_focus_other' => 'Thematic Focus - Other',
                        ],
                    ],
                    [
                        'title' => 'Beneficiaries (Target Groups)',
                        'fields' => [
                            'total_beneficiaries' => 'Total Number of Beneficiaries',
                            'beneficiary_types' => 'Beneficiaries (Target Groups)',
                            'beneficiary_types_other' => 'Beneficiaries - Other',
                        ],
                    ],
                    [
                        'title' => 'Scope of Activities',
                        'fields' => [
                            'scope_of_activities' => 'Scope of Activities',
                            'focal_area_key_interventions' => 'Focal Area / Key Interventions',
                        ],
                    ],
                    [
                        'title' => 'Clearance / Permission (if applicable)',
                        'fields' => [
                            'clearance_permissions' => 'Clearance / Permission (if applicable)',
                        ],
                    ],
                ],
                'repeat' => [
                    'ongoing_projects' => [
                        'label' => 'Ongoing Project Details',
                        'columns' => [
                            'ongoing_project_name' => 'Project Name',
                            'ongoing_target_area' => 'Target Area (District/City/Town/UC)',
                            'ongoing_start_date' => 'Start Date (MM/YYYY)',
                            'ongoing_end_date' => 'Expected Completion Date (MM/YYYY)',
                            'ongoing_total_funds' => 'Total Funds (PKR/USD)',
                            'ongoing_funding_source' => 'Funding Source / Donor',
                            'ongoing_thematic_focus' => 'Thematic Focus',
                            'ongoing_total_beneficiaries' => 'Total Beneficiaries',
                        ],
                    ],
                ],
                'files' => [],
            ],
            7 => [
                'title' => 'PART-7: PLANNED PROJECTS / PROGRAMMES / ASSIGNMENTS',
                'sections' => [
                    [
                        'title' => 'Planned Projects / Programmes / Assignments',
                        'fields' => [
                            'total_planned_projects' => 'Number of Planned Projects/Programmes/Assignments',
                        ],
                    ],
                ],
                'repeat' => [
                    'planned_projects' => [
                        'label' => 'Planned Project Details',
                        'columns' => [
                            'planned_project_name' => 'Project Name',
                            'planned_thematic_focus' => 'Thematic Focus',
                            'planned_geographic_focus' => 'Geographic Focus',
                            'planned_funding_source' => 'Potential Funding Source',
                            'planned_beneficiaries' => 'Expected Beneficiaries',
                        ],
                    ],
                ],
                'files' => [],
            ],
            8 => [
                'title' => 'PART-8: FINANCIAL INFORMATION',
                'sections' => [
                    [
                        'title' => 'Tax & Registration Information',
                        'fields' => [
                            'ntn_number' => 'National Tax Number (NTN)',
                            'tax_exemption_reference' => 'Tax Exemption Reference (if applicable)',
                        ],
                    ],
                    [
                        'title' => 'Principal Account',
                        'fields' => [
                            'principal_account_title' => 'Account Title',
                            'principal_account_iban' => 'Account IBAN',
                            'principal_account_number' => 'Account Number',
                            'principal_branch_address' => 'Branch Address',
                        ],
                    ],
                    [
                        'title' => 'Other Approved Accounts (if applicable)',
                        'fields' => [
                            'other_account_title' => 'Account Title',
                            'other_account_iban' => 'Account IBAN',
                            'other_account_number' => 'Account Number',
                            'other_branch_address' => 'Branch Address',
                        ],
                    ],
                    [
                        'title' => 'Funding Source',
                        'fields' => [
                            'funding_sources_financial' => 'Funding Source',
                            'funding_sources_financial_other' => 'Other (Specify)',
                        ],
                    ],
                    [
                        'title' => 'Annual Audit of Accounts',
                        'fields' => [
                            'last_audit_date' => 'Date of Last Audit',
                            'auditor_name' => 'Name of Recognized Auditor',
                            'audit_objections' => 'Audit Objections (if any)',
                            'next_audit_due_date' => 'Due Date of Next Audit',
                        ],
                    ],
                ],
                'repeat' => [],
                'files' => [
                    'audit_reports' => 'Attach Last Three Years\' Audit Reports (if applicable)',
                ],
            ],
            9 => [
                'title' => 'PART-9: ASSETS',
                'sections' => [
                    [
                        'title' => 'Movable Assets (Vehicles, Equipment, Endowments, etc.)',
                        'fields' => [
                            'vehicle_type' => 'Type of Vehicle',
                            'vehicle_registration_number' => 'Registration Number',
                            'vehicle_chassis_number' => 'Chassis Number',
                            'vehicle_year_of_manufacture' => 'Year of Manufacture',
                            'vehicle_model' => 'Model',
                            'vehicle_make' => 'Make',
                        ],
                    ],
                    [
                        'title' => 'Immovable Assets (Office Premises, Property Under NGO Use)',
                        'fields' => [
                            'property_status' => 'Status',
                            'property_location' => 'Location / Address',
                            'property_usage' => 'Usage',
                            'property_usage_other' => 'Usage - Other',
                            'lease_agreement' => 'Lease Agreement (If applicable)',
                            'property_acquisition_source' => 'Source of Property Acquisition',
                            'property_acquisition_source_other' => 'Acquisition Source - Other',
                        ],
                    ],
                    [
                        'title' => 'Car Rental Services (If applicable)',
                        'fields' => [
                            'rental_company_name' => 'Name of Rental Company',
                            'rental_company_address' => 'Company Address',
                        ],
                    ],
                ],
                'repeat' => [],
                'files' => [],
            ],
            10 => [
                'title' => 'PART-10: SECURITY AGREEMENT & ARRANGEMENTS',
                'sections' => [
                    [
                        'title' => 'Local Security Organizations (if Hired)',
                        'fields' => [
                            'local_security' => 'Local Security Organizations (if Hired)',
                        ],
                    ],
                    [
                        'title' => 'Other Security Arrangements (if applicable)',
                        'fields' => [
                            'other_security' => 'Other Security Arrangements (if applicable)',
                            'other_agency_name' => 'If Yes, Name of Security Agency',
                            'other_agency_term' => 'Term of Security Agreement: From - To',
                            'other_agency_nature' => 'Nature of Protection',
                        ],
                    ],
                ],
                'repeat' => [
                    'security_companies' => [
                        'label' => 'Security Company Details',
                        'prefix' => 'sec_company',
                        'count' => 2,
                        'columns' => [
                            'name' => 'Security Company Name',
                            'address' => 'Address',
                            'contact' => 'Contact Person',
                            'telephone' => 'Telephone',
                            'email' => 'Email',
                            'duration' => 'Agreement Duration (From - To)',
                        ],
                    ],
                ],
                'files' => [],
            ],
        ];
    }

    public static function title(int $step): ?string
    {
        return self::steps()[$step]['title'] ?? null;
    }
}