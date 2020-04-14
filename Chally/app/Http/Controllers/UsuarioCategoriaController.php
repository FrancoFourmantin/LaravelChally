<?php

namespace App\Http\Controllers;

use App\UsuarioCategoria;
use Illuminate\Http\Request;
use App\Usuario;
use App\Categoria;
use Auth;
Use Alert;
use Cookie;

class UsuarioCategoriaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\UsuarioCategoria  $usuarioCategoria
    * @return \Illuminate\Http\Response
    */
    public function show(UsuarioCategoria $usuarioCategoria)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\UsuarioCategoria  $usuarioCategoria
    * @return \Illuminate\Http\Response
    */
    public function edit(UsuarioCategoria $usuarioCategoria)
    {
        //
    }
    
    
    public function cookieApi(Request $request){
        return $request->cookie('respondio_intereses', 'default');
        return $request->cookie('respondio_intereses');
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\UsuarioCategoria  $usuarioCategoria
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        //Un usuario no puede tener un interes duplicado
        //Un usuario tiene muchos categorias
        //Las categorias tienen muchos usuarios
        //Si a traves de este pedido no viene un id que se encuentre dentro de la lista de intereses se eliminara el mismo
        //Si llega un id categoria que el usuario no tenga se crea una nueva fila
        if(Auth::user()){
            $id_usuario = Auth::user()->id_usuario;


            //Array donde vamos a tener las ID de categorias que se enviaron por request
            if($request->input('intereses')){
                $categoriasRequest = $request->input('intereses');
            }else{
                return redirect()->back();
            }


            //Aqui vamos a tener todas las categorias a las que esta subscrito el usuario
            $categoriasUsuario = Usuario::find($id_usuario)->getCategorias;
            
            //Significa que el usuario no tiene categorias
            if($categoriasUsuario->isEmpty()){
                foreach($categoriasRequest as $categoriaRequest){
                    $interes = new UsuarioCategoria();
                    $interes->id_categoria = Categoria::find($categoriaRequest)->id;
                    $interes->id_usuario = Usuario::find($id_usuario)->id_usuario;
                    $interes->save();
                }
            }else{
                //Aqui vamos a recorrer todas las categorias a las que esta subscrito el usuario
                foreach($categoriasUsuario as $categoriaUsuario){
                    //Aqui vamos a buscar si existe un index en el request 
                    $indexIdCategoria = array_search($categoriaUsuario->id , $categoriasRequest);
                    
                    //Aprovechamos y guardamos en un array todos los id de las categorias a las que esta subscrito el usuario
                    $arrayIdCategoriaUsuarios[] = $categoriaUsuario->id;
                    //Si no existe significa que el usuario elimino el interes
                    if($indexIdCategoria === false){
                        $id_categoria = $categoriaUsuario->id;
                        $interes = UsuarioCategoria::get()->where('id_categoria' , '=' , $id_categoria)->where('id_usuario' , '=' , $id_usuario)->first();
                        $interes->delete();
                    }
                }
                
                foreach($categoriasRequest as $categoriaRequest){
                    
                    $indexIdCategoria = array_search($categoriaRequest , $arrayIdCategoriaUsuarios);
                    if($indexIdCategoria === false){
                        $interes = new UsuarioCategoria();
                        $interes->id_categoria = Categoria::find($categoriaRequest)->id;
                        $interes->id_usuario = Usuario::find($id_usuario)->id_usuario;
                        $interes->save();
                    }
                }
                
            }
            
            $cookie = Cookie::forget('respondio_intereses');
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->withCookie($cookie); 
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\UsuarioCategoria  $usuarioCategoria
    * @return \Illuminate\Http\Response
    */
    public function destroy(UsuarioCategoria $usuarioCategoria)
    {
        $usuarioCategoria->delete();
    }
}
