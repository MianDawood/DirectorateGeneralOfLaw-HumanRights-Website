<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoDirective extends Model
{
    protected $fillable = [
        'heading',
        'card_1_title',
        'card_1_desc',
        'card_2_title',
        'card_2_desc',
        'hero_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}