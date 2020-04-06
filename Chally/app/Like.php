<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "likes";
    protected $primaryKey = "id";


        /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        "id_desafio" , "id_usuario" , "like_or_dislike" , "id_respuesta"
    ];
}
