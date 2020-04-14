<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Desafio;
use App\Respuesta;
use App\Amistad;
use App\Bookmark;
use Auth;
use App\Categoria;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    
    use Notifiable;
    
    public function getDesafios(){
        return $this->hasMany('App\Desafio','id_usuario','id_autor');
    }
    
    public function getRespuestas(){
        return $this->hasMany('App\Respuesta','id_usuario','id_autor');
    }


    public function getBookmarks(){
        return $this->hasMany('App\Bookmark','id_usuario','id_usuario');
    }
    
    static function getSolicitudesDeAmistad() 
    {
        $solicitudes = Amistad::where('id_usuario_2' , Auth::user()->id_usuario)->where('updated_at' , null)->count();
        return $solicitudes;
    }

    public function getCategorias(){
        return $this->belongsToMany(Categoria::class , 'usuarios-categorias' , 'id_usuario' , 'id_categoria');
    }

    public function getCategoriaStatus($id_usuario , $id_categoria){

        foreach(Usuario::find($id_usuario)->getCategorias as $categoria){

            if($categoria->id == $id_categoria){
                return 'checked';
            }
        }
        return "";
    }
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre', 'email', 'password','fecha_nacimiento', 'sexo','apellido' , 'username' , 'avatar'
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
