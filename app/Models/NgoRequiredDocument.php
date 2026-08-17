<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoRequiredDocument extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}