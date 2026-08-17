<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventVideo extends Model
{
    protected $fillable = [
        'event_id',
        'youtube_url',
        'youtube_video_id',
        'title',
        'order',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
