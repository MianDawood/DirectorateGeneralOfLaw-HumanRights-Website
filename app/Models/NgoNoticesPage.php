<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoNoticesPage extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'content',
        'image',
        'button_text',
        'button_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function getSection(string $sectionKey): ?self
    {
        return static::where('section_key', $sectionKey)
            ->where('is_active', true)
            ->first();
    }

    public static function getSections(): array
    {
        return static::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->keyBy('section_key')
            ->toArray();
    }
}