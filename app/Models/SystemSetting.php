<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'system_name',
        'tagline',
        'description',
        'email',
        'phone',
        'address',
        'logo',
        'favicon',
        'social_facebook',
        'social_twitter',
        'social_linkedin',
        'social_instagram',
        'footer_text',
    ];
}
