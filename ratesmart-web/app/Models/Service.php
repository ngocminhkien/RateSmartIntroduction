<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'code', // saas, private_cloud, custom_enterprise
        'badge',
        'short_description',
        'content',
        'features', // JSON list of features
        'pricing_note',
        'icon',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
}
