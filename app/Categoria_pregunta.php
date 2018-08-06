<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_pregunta extends Model
{
    protected $table    = "categoria_preguntas";
    protected $fillable = [
        'nombre',
    ];

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta'); 
    }

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

}
