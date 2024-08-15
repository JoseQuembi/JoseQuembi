<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Resource extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
        'name',
        'type',        // Tipo de recurso (humano, material, financeiro)
        'quantity',    // Quantidade disponível (para materiais ou tempo disponível para humanos)
        'unit_cost',   // Custo por unidade (hora, peça, etc.)
        'project_id',  // Relacionamento com o projeto ao qual o recurso está alocado
        'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
