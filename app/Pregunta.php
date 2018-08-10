<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $table    = "preguntas";
    protected $fillable = [
        'pregunta', 'respuesta', 'categoria_pregunta_id',
    ];

    public function categoria_pregunta()
    {
        return $this->belongsTo('App\Categoria_pregunta');
    }
}
