<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'ventajas', 'descripcion', 'contenido', 'categoria_id', 'caracteristicas', 'manual', 'despiece', 'visible', 'orden', 'presentacion', 'imagen_presentacion', 'precio', 'rubro_id', 'modelo_id', 'tipo', 'iva', 'aplica_desc'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function rubros()
    {
        return $this->belongsToMany('App\Rubro', 'rubro_producto', 'producto_id', 'rubro_id');
    }

    public function preguntas()
    {
        return $this->belongsTo('App\Categoria_pregunta');
    }

    public function modelos()
    {
        return $this->belongsToMany('App\Modelo', 'modelo_producto', 'producto_id', 'modelo_id');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }

    public function descuento()
    {
        return $this->belongsTo('App\Descuento');
    }

    public function aplicaciones()
    {
        return $this->belongsToMany('App\Aplicacion', 'aplicacion_producto', 'producto_id', 'aplicacion_id');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedido_producto')->withPivot('cantidad', 'costo', 'iva', 'total');
    }

    public function relacionados()
    {
        return $this->hasMany('App\Producto_relacionado'); 
    }

}
