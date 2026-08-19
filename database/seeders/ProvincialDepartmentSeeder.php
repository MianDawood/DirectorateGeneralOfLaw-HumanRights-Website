<?php

namespace Database\Seeders;

use App\Models\ProvincialDepartment;
use Illuminate\Database\Seeder;

class ProvincialDepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Social Welfare, Special Education and Women Empowerment Department',
                'url' => 'https://swkpk.gov.pk/',
                'order' => 0,
            ],
            [
                'name' => 'Khyber Pakhtunkhwa Commission on the Status of Women',
                'url' => 'https://kpcsw.gov.pk/',
                'order' => 1,
            ],
            [
                'name' => 'Child Protection and Welfare Commission Khyber Pakhtunkhwa',
                'url' => 'https://kpcpwc.gov.pk/',
                'order' => 2,
            ],
            [
                'name' => 'Office of the Provincial Ombudsman Khyber Pakhtunkhwa',
                'url' => 'https://www.ombudsmankp.gov.pk/',
                'order' => 3,
            ],
            [
                'name' => 'Office of the Ombudsperson for Protection Against Harassment of Women at Workplace',
                'url' => 'https://ombudsperson.kp.gov.pk/',
                'order' => 4,
            ],
            [
                'name' => 'Right to Information Commission Khyber Pakhtunkhwa',
                'url' => 'https://www.kprti.gov.pk/',
                'order' => 5,
            ],
            [
                'name' => 'Right to Services Commission Khyber Pakhtunkhwa',
                'url' => 'https://www.kprts.gov.pk/',
                'order' => 6,
            ],
        ];

        foreach ($departments as $department) {
            ProvincialDepartment::updateOrCreate(
                ['name' => $department['name']],
                $department
            );
        }
    }
}