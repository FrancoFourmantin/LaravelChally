<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

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
}
