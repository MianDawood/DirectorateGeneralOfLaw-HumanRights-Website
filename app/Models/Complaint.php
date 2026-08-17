<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'cnic',
        'contact_number',
        'district',
        'category',
        'details',
        'attachment_path',
        'status',
    ];
}
