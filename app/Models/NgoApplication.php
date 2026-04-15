<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_no',
        'status',
        'current_step',
        'submitted_at',
        'review_notes',
        'created_by',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];
}
