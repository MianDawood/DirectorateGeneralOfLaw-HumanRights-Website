<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatWeDoActivity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function getAllActive(): array
    {
        return static::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->toArray();
    }
}