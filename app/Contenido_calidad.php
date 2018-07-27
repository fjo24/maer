<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_home extends Model
{
    protected $table    = "contenido_calidades";
    protected $fillable = [
        'nombre', 'descripcion',
    ];
}
