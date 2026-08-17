<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntroductionHead extends Model
{
    protected $fillable = [
        'name',
        'role',
        'message',
        'image',
        'profile_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
