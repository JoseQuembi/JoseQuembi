<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'currency',
        'project_id', // Chave estrangeira para o projeto
        'description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
