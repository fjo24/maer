<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calidad extends Model
{
    protected $table    = "calidad";
    protected $fillable = [
        'nombre', 'descripcion', 'descripcion2', 'contenido', 'imagen',
    ];
}
