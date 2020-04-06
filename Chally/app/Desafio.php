<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Categoria;
use App\Respuesta;
use App\Like;
use Carbon\Carbon;

class Desafio extends Model
{
    //
    protected $table = "desafios";
    protected $primaryKey = "id";
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $fillable= [
        'id','fecha_creacion','fecha_limite','imagen','descripcion','id_respuesta_ganadora','id_categoria','id_autor','dificultad','requisitos','nombre'
    ];

    public function getUsuario(){
        return $this->belongsTo('App\Usuario','id_autor','id_usuario');
    }

    public function getCategoria(){
        return $this->hasOne('App\Categoria','id','id_categoria');
    }

    public function getRespuestas(){
        return $this->hasMany('App\Respuesta','id_desafio','id');
    }

    public function getLikes(){
        return $this->hasMany('App\Like' , 'id_desafio' , 'id');
    }
}
