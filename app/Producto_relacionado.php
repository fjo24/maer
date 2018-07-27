<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_relacionado extends Model
{
    protected $table = 'producto_relacionados';

    protected $fillable = [
        'producto_a', 'producto_b',
    ];
}
