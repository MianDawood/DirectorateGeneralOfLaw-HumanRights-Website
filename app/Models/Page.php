<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'static_parent',
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'show_in_navigation',
        'order',
        'template',
        'published_at',
    ];

    /**
     * Get the parent page.
     */
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    /**
     * Get the child pages.
     */
    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id')->ordered();
    }

    protected $casts = [
        'content' => 'string',
        'show_in_navigation' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });

        static::updating(function ($page) {
            if ($page->isDirty('title') && empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    /**
     * Scope to get only published pages.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
                    ->where(function ($q) {
                        $q->whereNull('published_at')
                          ->orWhere('published_at', '<=', now());
                    });
    }

    /**
     * Scope to get pages that should show in navigation.
     */
    public function scopeInNavigation(Builder $query): Builder
    {
        return $query->where('show_in_navigation', true);
    }

    /**
     * Scope to get ordered pages.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderBy('title');
    }

    /**
     * Get the URL for the page.
     */
    public function getUrlAttribute(): string
    {
        return route('page.show', $this->slug);
    }

    /**
     * Get the meta title or fall back to the page title.
     */
    public function getMetaTitleAttribute($value): string
    {
        return $value ?: $this->title;
    }

    /**
     * Get the meta description or fall back to a truncated content.
     */
    public function getMetaDescriptionAttribute($value): string
    {
        if ($value) {
            return $value;
        }
        
        return Str::limit(strip_tags($this->content), 160);
    }

    /**
     * Check if the page is published.
     */
    public function isPublished(): bool
    {
        return $this->status === 'published' && 
               (!$this->published_at || $this->published_at->isPast());
    }

    /**
     * Check if the page should be shown in navigation.
     */
    public function shouldBeInNavigation(): bool
    {
        return $this->show_in_navigation && $this->isPublished();
    }
}
