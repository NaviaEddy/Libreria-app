<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'editorial_id',
        'edicion',
        'pais',
        'precio',
    ];
    
    public function editorial()
    {
    return $this->belongsTo('App\Models\Publisher', 'editorial_id');
    }
}
