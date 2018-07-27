<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_home extends Model
{
    protected $table    = "contenido_homes";
    protected $fillable = [
        'nombre', 'descripcion', 'contenido', 'imagen', 'link',
    ];
}
