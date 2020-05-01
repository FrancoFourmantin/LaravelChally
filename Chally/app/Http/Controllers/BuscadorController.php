<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Usuario;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function apiResultados($busqueda)
    {
        /**
         * #####--Funcionamiento buscador--#####
         * 1) Traer todos los resultados de categorias y usuarios 
         * 2) Armar array como el de ejemplo aqui abajo para retornar un json y que despues el navegador se encargue de mostrar resultados
         * 3) Insertar en el array nombre de usuario, username y nombre de categoria y su id 
         */
        if(strlen($busqueda) < 3){
            $categorias = Categoria::where('nombre' , 'like' , "$busqueda%")->limit(5)->get();
     
            $usuarios = Usuario::where('nombre' , 'like' , "$busqueda%")->limit(5)->get();
    
            $usernames = Usuario::where('username' , 'like' , "$busqueda%")->limit(5)->get();
        }
         
         
         if(strlen($busqueda) >= 3){
             $categorias = Categoria::where('nombre' , 'like' , "%$busqueda%")->limit(5)->get();
     
             $usuarios = Usuario::where('nombre' , 'like' , "%$busqueda%")->limit(5)->get();
     
             $usernames = Usuario::where('username' , 'like' , "%$busqueda%")->limit(5)->get();
         }


        $arrayRespuestas = [];

        $contador = 0;

        if(!empty($categorias)){

            foreach ($categorias as $categoria) {
                $arrayRespuestas['categorias'][$contador]['nombre'] = $categoria->nombre;
                $arrayRespuestas['categorias'][$contador]['id'] = $categoria->id;
                $arrayRespuestas['categorias'][$contador]['parent'] = ($categoria->parent_id == null) ? true : false;
                $contador += 1;
            }
        }

        if(!empty($usuarios)){
            
            $contador = 0;
            foreach ($usuarios as $usuario) {
                $arrayRespuestas['usuarios'][$contador]['nombre'] = $usuario->nombre;
                $arrayRespuestas['usuarios'][$contador]['apellido'] = $usuario->apellido;
                $arrayRespuestas['usuarios'][$contador]['username'] = $usuario->username;
                $arrayRespuestas['usuarios'][$contador]['avatar'] = $usuario->avatar;
                $contador += 1;
            }
        }

        // if(!empty($usernames)){
        //     $contador = 0;
        //     foreach ($usernames as $username) {
        //         $arrayRespuestas['usernames'][$contador]['nombre'] = $username->nombre;
        //         $arrayRespuestas['usernames'][$contador]['apellido'] = $username->apellido;
        //         $arrayRespuestas['usernames'][$contador]['username'] = $username->username;
        //         $arrayRespuestas['usernames'][$contador]['avatar'] = $username->avatar;
        //         $contador += 1;
        //     }
        // }


        return json_encode($arrayRespuestas);


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
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function show($id)
                {
                    //
                }
                
                /**
                * Show the form for editing the specified resource.
                *
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function edit($id)
                {
                    //
                }
                
                /**
                * Update the specified resource in storage.
                *
                * @param  \Illuminate\Http\Request  $request
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function update(Request $request, $id)
                {
                    //
                }
                
                /**
                * Remove the specified resource from storage.
                *
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function destroy($id)
                {
                    //
                }
            }
            