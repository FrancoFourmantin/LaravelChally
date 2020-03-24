<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Desafio;
use App\Usuario;

class Bookmark extends Model
{
    protected $table = "bookmarks";
    public $primaryKey = "id";

    public function getDesafio(){
        return $this->belongsTo('App\Desafio','id_desafio','id');
    }

    public function getUsuario(){
        return $this->belongsTo('App\Usuario','id_usuario','id_usuario');
    }

}


