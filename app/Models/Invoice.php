<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Invoice extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
        'payment_id',
        'project_id',
        'client_id',
        'invoice_number',
        'issue_date',
        'due_date',
        'total_amount',
        'status',
        'notes',
        'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('invoice_number','due_date')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
