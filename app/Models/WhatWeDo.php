<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatWeDo extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'extra_description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}