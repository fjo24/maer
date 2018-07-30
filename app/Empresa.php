<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table    = "empresas";
    protected $fillable = [
        'nombre', 'descripcion', 'contenido', 'imagen', 'link', 'texto1', 'texto2', 'texto3', 'numero1', 'numero2', 'numero3', 
    ];
}
