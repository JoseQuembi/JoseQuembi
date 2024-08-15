<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'website',
        'user_id', // Chave estrangeira para o usuário
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
