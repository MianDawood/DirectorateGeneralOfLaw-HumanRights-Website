<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'event_date',
        'image_path',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active events
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured events
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordering by event date
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('event_date', 'asc')->orderBy('order', 'asc');
    }
}
