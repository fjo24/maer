<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table    = "categorias";
    protected $fillable = [
        'id_superior', 'nombre', 'orden', 'imagen',
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto'); 
    }
}
