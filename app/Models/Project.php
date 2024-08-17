<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory, HasSlug;

    // Define quais atributos podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'description',
        'type', // Pode ser 'web', 'mobile', etc.
        'client_id',
        'user_id',
        'start_date',
        'end_date',
        'status',
        'progress',
        'slug'
    ];

    // Define casts para tipos específicos de dados
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'progress' => 'integer', // Caso o progresso seja um valor numérico
    ];

    // Configurações para o Slug gerado a partir do nome do projeto
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // Relacionamentos

    // Um Projeto pode ter muitos Recursos
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    // Um Projeto pode ter muitos Orçamentos
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    // Um Projeto pode ter muitas Tarefas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Um Projeto tem uma Equipe associada
    public function team()
    {
        return $this->hasOne(Team::class);
    }

    // Um Projeto pertence a um Cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Um Projeto pertence a um Usuário (provavelmente o criador ou responsável)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function risks()
    {
        return $this->hasMany(Risk::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
