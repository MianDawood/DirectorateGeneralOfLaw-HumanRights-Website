<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject',
        'category_id',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(EventImage::class)->orderBy('order')->orderBy('id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(EventVideo::class)->orderBy('order')->orderBy('id');
    }

    public function coverImageUrl(): ?string
    {
        $first = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->first();

        if ($first?->image_path) {
            return asset('storage/' . $first->image_path);
        }

        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }

        return null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('event_date', 'desc')->orderBy('order', 'asc');
    }
}
