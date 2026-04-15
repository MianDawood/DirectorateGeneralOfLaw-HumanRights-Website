<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'file_path',
        'file_size',
        'file_type',
        'published_date',
        'is_active',
        'order'
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_active' => 'boolean',
    ];

    // Scope for active publications
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordering publications
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('published_date', 'desc');
    }

    // Scope for filtering by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
