<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table    = "novedades";
    protected $fillable = [
        'nombre', 'fecha', 'descripcion', 'contenido', 'categoria_novedad_id', 'orden', 'imagen1', 'imagen2', 'producto_id',
    ];

    public function categoria_novedad()
    {
        return $this->belongsTo('App\Categoria_novedad');
    }

    public function getfechaAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-y');
    }

    public function setfechaAttribute($date)
    {
        $this->attributes['fecha'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

}
