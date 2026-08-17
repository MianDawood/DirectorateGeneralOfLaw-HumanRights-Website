<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_key',
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

    public static function getByPage(string $pageKey): array
    {
        return static::where('page_key', $pageKey)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->toArray();
    }

    public static function getSection(string $pageKey, string $sectionKey): ?self
    {
        return static::where('page_key', $pageKey)
            ->where('section_key', $sectionKey)
            ->where('is_active', true)
            ->first();
    }

    public static function getFirstSection(string $pageKey, string $sectionKey): ?self
    {
        return static::where('page_key', $pageKey)
            ->where('section_key', $sectionKey)
            ->where('is_active', true)
            ->orderBy('order')
            ->first();
    }

    public static function getSections(string $pageKey): array
    {
        return static::where('page_key', $pageKey)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('section_key')
            ->toArray();
    }
}