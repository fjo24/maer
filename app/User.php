<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'apellido','social', 'cuit', 'telefono', 'direccion', 'username', 'email', 'nivel', 'password', 'activo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
