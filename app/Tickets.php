<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
    protected $fillable = [
        'user_id',
        'modulo_id',
        'admins_id',
        'nombre',
        'titulo',
        'comentarios',
        'descripcion',
        'prioridad',
        'status',
        'imagen',
        'fecha',
        'hora',
    ];
}
