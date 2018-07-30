<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_calidad extends Model
{
    protected $table    = "contenido_calidades";
    protected $fillable = [
        'nombre', 'descripcion', 'descripcion2', 'contenido', 'imagen',
    ];
}
