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
        'head_name',
        'focal_name',
        'geographical_local',
        'geographical_provincial',
        'geographical_national',
        'previous_authority',
        'previous_reg_no',
        'work_duration_years',
        'byelaws_status',
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
