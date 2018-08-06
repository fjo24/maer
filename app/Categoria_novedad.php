<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_novedad extends Model
{
    protected $table    = "categoria_novedades";
    protected $fillable = [
        'nombre', 'orden',
    ];

    public function novedades()
    {
        return $this->hasMany('App\Novedad');

    }
}
