<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table    = "modelos";
    protected $fillable = [
        'codigo', 'medida',
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto'); 
    }
}
