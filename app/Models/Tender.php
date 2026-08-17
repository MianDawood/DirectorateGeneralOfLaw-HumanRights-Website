<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'reference_no',
        'publish_date',
        'closing_date',
        'status',
        'file_path',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'closing_date' => 'date',
    ];
}
