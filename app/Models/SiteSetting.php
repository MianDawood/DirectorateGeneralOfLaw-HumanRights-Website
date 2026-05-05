<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SiteSetting extends Model
{
    protected $fillable = [
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'contact_email',
        'contact_phone',
        'contact_address',
        'home_campaign_primary',
        'home_campaign_secondary',
    ];

    public static function getSettings()
    {
        return static::first() ?? new static([
            'home_campaign_primary' => 'Marka-E-Haq',
            'home_campaign_secondary' => 'Anti-Corruption Week',
        ]);
    }

    /**
     * Backward compatibility helper for layout.blade.php
     */
    public static function getMany(array $defaults): array
    {
        $settings = static::getSettings();
        $results = [];
        foreach ($defaults as $key => $default) {
            $results[$key] = $settings->{$key} ?? $default;
        }
        return $results;
    }
}
