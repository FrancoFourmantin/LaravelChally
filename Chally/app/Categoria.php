<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Usuario;


class Categoria extends Model
{
    use NodeTrait;
    protected $table = 'Categorias';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre'
    ];

    static function getChilds($id){
        $categoriasChild = Categoria::where('parent_id',"=",$id)->get();
        return $categoriasChild;
    }

    public function getUsuarios(){
        return $this->belongsToMany(Usuario::class , 'usuarios-categorias' , 'id_categoria' , 'id_usuario');
    }
}
