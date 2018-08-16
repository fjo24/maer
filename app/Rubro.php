<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table    = "rubros";
    protected $fillable = [
        'nombre', 'orden', 'imagen',
    ];

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'rubro_producto', 'rubro_id', 'producto_id');
    }
}
