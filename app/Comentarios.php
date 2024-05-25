<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    //
    protected $fillable = ['comentario', 'user_id', 'ticket_id'];
}
