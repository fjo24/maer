<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table    = "pedidos";
    protected $fillable = [
        'fecha', 'iva', 'subtotal', 'total', 'distribuidor_id',
    ];

    public function distribuidor()
    {
        return $this->belongsTo('App\Distribuidor');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'carrito_pedido_producto')->withPivot('cantidad', 'costo');
    }

    public function cproductos()
    {
        return $this->belongsToMany('App\Producto', 'carrito_pedido_producto')->withPivot('cantidad', 'costo', 'pedir');
    }

    public function getfechaAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d · m · y');
    }

    public function setfechaAttribute($date)
    {
        $this->attributes['fecha'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }
}
