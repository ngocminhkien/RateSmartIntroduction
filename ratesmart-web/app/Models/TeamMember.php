<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_title', // CEO, COO, CTO
        'organization',
        'bio',
        'experience_years',
        'avatar_url',
        'badge_color',
        'order',
        'is_active',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
