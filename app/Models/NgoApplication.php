<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_no',
        'registration_no',
        'status',
        'suspended_at',
        'suspension_reason',
        'current_step',
        'submitted_at',
        'review_notes',
        'created_by',
        'certificate_issue_date',
        'certificate_path',
        'expiry_date',
        'last_renewal_date',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'certificate_issue_date' => 'datetime',
        'suspended_at' => 'date',
        'expiry_date' => 'date',
        'last_renewal_date' => 'date',
    ];

    public function profile()
    {
        return $this->hasOne(\App\Models\NgoProfile::class, 'application_id');
    }
}
