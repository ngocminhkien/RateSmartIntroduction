<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'company_name',
        'interested_package', // SaaS, Private Cloud, Custom Enterprise
        'message',
        'status', // new, contacting, meeting_scheduled, converted, closed
        'notes',
    ];
}
