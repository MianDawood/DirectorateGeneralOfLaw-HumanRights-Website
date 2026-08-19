<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'full_name',
        'cnic',
        'contact_number',
        'district',
        'category',
        'details',
        'attachment_path',
        'status',
    ];

    protected static function booted()
    {
        static::created(function (Complaint $complaint) {
            if (!$complaint->reference_no) {
                $complaint->forceFill([
                    'reference_no' => 'CMP-' . ($complaint->created_at?->format('Y') ?: now()->format('Y')) . '-' . str_pad($complaint->id, 5, '0', STR_PAD_LEFT),
                ])->saveQuietly();
            }
        });
    }
}
