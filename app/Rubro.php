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
        return $this->hasMany('App\Producto'); 
    }
}
