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
        'current_step',
        'submitted_at',
        'review_notes',
        'created_by',
        'certificate_issue_date',
        'certificate_path',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'certificate_issue_date' => 'datetime',
    ];
}
