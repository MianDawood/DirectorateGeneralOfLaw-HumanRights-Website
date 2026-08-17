<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait NgoFilters
{
    public function ngoThematicAreas(): array
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

    public function ngoDistricts(): array
    {
        if (!Schema::hasTable('ngo_profiles')) {
            return [];
        }

        return DB::table('ngo_profiles')
            ->whereNotNull('district')
            ->where('district', '!=', '')
            ->distinct()
            ->orderBy('district')
            ->pluck('district')
            ->all();
    }
}