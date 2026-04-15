<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoNotice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_public_notice',
    ];

    protected $casts = [
        'is_public_notice' => 'boolean',
    ];
}
