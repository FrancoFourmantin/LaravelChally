<?php

namespace App;
use App\Desafio;
use App\Usuario;

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

    public function getDesafio(){
        return $this->hasOne('App\Desafio','id','id_desafio');
    }

    public function getVotante(){
        return $this->hasOne('App\Usuario','id_usuario','id_votante');
    }

    public function getRespuesta(){
        return $this->hasOne('App\Respuesta' , 'id' , 'id_respuesta_votada');
    }
}