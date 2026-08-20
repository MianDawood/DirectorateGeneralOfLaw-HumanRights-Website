<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoProfile extends Model
{
    protected $fillable = [
        'application_id',
        'organization_name',
        'establishment_date',
        'district',
        'registration_authority',
        'registration_details',
        'organization_type',
        'area_of_interest',
        'local_districts',
        'national_provinces',
        'head_name',
        'geographical_local',
        'geographical_provincial',
        'geographical_national',
        'previous_authority',
        'previous_reg_no',
        'work_duration_years',
        'parent_ngo_name',
        'sister_ngo_name',
        'security_approval',
        'security_approval_details',
        'professional_associations',
        'general_objectives',
        'thematic_areas',
        'geographical_focus',
        'collaboration_partner',
        'collaboration_nature',
        'collaboration_activities',
        'extra_data',
    ];

    public function application()
    {
        return $this->belongsTo(NgoApplication::class, 'application_id');
    }
}
