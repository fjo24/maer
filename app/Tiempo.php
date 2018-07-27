<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{
    protected $table = 'tiempos';

    protected $fillable = [
        'ano','parrafo',
    ];
}
