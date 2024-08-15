<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Payment extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
        'project_id',
        'client_id',
        'total_amount',
        'installment',
        'status',
        'due_date',
        'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('project_id','due_date')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'due_date' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
