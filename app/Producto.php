<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'ventajas', 'descripcion', 'contenido', 'categoria_id', 'caracteristicas', 'manual', 'despiece', 'visible', 'orden', 'presentacion', 'imagen_presentacion', 'precio', 'rubro_id', 'modelo_id', 'tipo',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function rubro()
    {
        return $this->belongsTo('App\Rubro');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Modelo');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }

    public function aplicaciones()
    {
        return $this->belongsToMany('App\Aplicacion', 'aplicacion_producto', 'producto_id', 'aplicacion_id');
    }

}
