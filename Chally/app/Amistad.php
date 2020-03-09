<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amistad extends Model
{
    protected $table = 'amistades';
    protected $primaryKey = 'id_amistad';

    protected $fillable = [
        'id_usuario', 'id_usuario_1', 'id_usuario_2', 'created_at', 'updated_at'
    ];

    public function getUsuariosSolicitud()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario_1', 'id_usuario');
    }

    public function getUsuariosPendientes()
    {
        return $this->belongsTo('App\Usuario ', 'id_usuario_2', 'id_usuario');
    }
}
