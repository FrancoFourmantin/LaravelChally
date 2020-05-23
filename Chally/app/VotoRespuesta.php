<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotoRespuesta extends Model
{
    protected $table = 'votos_respuestas';
    protected $primaryKey = 'id';


    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_desafio', 'id_votante', 'id_respuesta_votada'
    ];
}
