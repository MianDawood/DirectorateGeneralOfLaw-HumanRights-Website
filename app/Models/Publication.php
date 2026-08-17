<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'category_id',
        'file_path',
        'file_size',
        'file_type',
        'image_path',
        'published_date',
        'is_active',
        'order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function categoryRelation(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function coverImageUrl(): ?string
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }

        return null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('published_date', 'desc');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeDateFrom($query, $date)
    {
        return $query->whereDate('published_date', '>=', $date);
    }

    public function scopeDateTo($query, $date)
    {
        return $query->whereDate('published_date', '<=', $date);
    }
}