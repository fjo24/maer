<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table    = "descuentos";
    protected $fillable = [
        'minimo', 'maximo', 'porcentaje',
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }

}
