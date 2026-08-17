<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'media_path',
        'thumbnail_path',
        'duration',
        'status',
        'order',
    ];
}
