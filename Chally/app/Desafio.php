<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desafio extends Model
{
    //
    protected $table = "desafios";
    protected $primaryKey = "id_desafio";
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $fillable= [
        'id_desafio','fecha_creacion','fecha_limite','imagen','descripcion','id_respuesta_ganadora','id_categoria','id_autor','dificultad','requisitos','nombre'
    ];
}
