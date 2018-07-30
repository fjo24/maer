<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    protected $table = "aplicaciones";
    protected $fillable = ['nombre', 'imagen','descripcion', 'orden'];

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'aplicacion_producto');
    }
}
