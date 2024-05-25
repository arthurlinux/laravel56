<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
    protected $fillable = [
        'agente_id',
        'modulo_id',
        'cliente_id',
        'nombre',
        'titulo',
        'comentarios',
        'descripcion',
        'prioridad',
        'status',
        'imagen',
        'fecha',
        'hora',
        'solucion',
    ];
}
