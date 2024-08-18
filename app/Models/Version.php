<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $fillable = ['number','description','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
