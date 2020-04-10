<?php

namespace App\Http\Controllers;
use App\Desafio;
use App\Like;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LikeController extends Controller
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
        //Si el usuario ya le dio like, y toca el boton de like significa que lo quiere eliminar
        //Si el usuario ya le dio dislike, y toca el boton significa que lo quiere eliminar
        //Si el usuario toco el boton de like y ahora toca el de dislike, se deberan cambiar la columna like_or_dislike  y viceversa

        $id_usuario = $request->id_usuario;
        $id_desafio = $request->id_desafio;
        $accion = $request->accion;
       
        //Aqui tenemos dos opciones, podemos traer todos los likes del usuario, o podemos traer todos los likes del desafio
        $desafio = Desafio::find($id_desafio);
        $likes = $desafio->getLikes;

        //Una vez tengamos los likes vamos a verificar que no tenga ninguna fila creada el usuario para ese desafio si la tiene vamos a verifcar en que estado esta la columna like_or_dislike
     
        foreach($likes as $like){
            if($like->id_usuario == $id_usuario){
                // return $accion;
                // return $like->like_or_dislike;
                if($accion == 'like' && $like->like_or_dislike == false){
                    $like->like_or_dislike = true;
                    $like->save();
                    return "Guardado dsp de verificar";
                }

                if($accion == 'dislike' && $like->like_or_dislike == true){
                    $like->like_or_dislike = false;
                    $like->save();
                    return "Guardado dsp de verificar";
                }

                if ($accion == 'like' && $like->like_or_dislike == true){
                    $like->destroy($like->id);
                    $like->save();
                    return "Guardado dsp de verificar";
                }
                  
                if($accion == 'dislike' && $like->like_or_dislike == false){
                    $like->destroy($like->id);
                    $like->save();
                    return "Guardado dsp de verificar";
                }



                
            }


        }

        //Si llegamos a este punto significa que el usuario todavia no le doy like ni dislike
        $newLike = new Like();
        $newLike->id_desafio = $id_desafio;
        $newLike->id_usuario = $id_usuario;
        if($accion == 'like'){
            $newLike->like_or_dislike = true;
        }else{
            $newLike->like_or_dislike = false;
        }

        $newLike->save();

        return "Salvado correctamente";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_desafio)
    {
        $desafio = Desafio::find($id_desafio);
        //Vamos a chequear si el usuario logeado le dio like al post en cuestion

        // Con esta funcion podemos retornar los likes por desafio
        $likes = $desafio->getLikes->where('like_or_dislike' , '=' , '1')->count();
        $dislikes = $desafio->getLikes->where('like_or_dislike' , '=' , '0')->count();    
        $total = $desafio->getLikes->count();
        
        $authUserDislike = false;
        $authUserLike = false;
        //Con este foreach vamos a verificar si el usuario logeado ya le dio LIKE al post en cuestion
        foreach($desafio->getLikes as $like){
            if($like->id_usuario == Auth::user()->id_usuario){
                if($like->like_or_dislike == '1'){
                    $authUserLike = true;            
                }else{
                    $authUserDislike = true;
                }
                break;  //Lo obligamos a salir del foreach por que me da paja hacer un while
            }
        }

        //Aqui se calcula el porcentaje de likes
        if($total){
            $porcentajeDeLikes = round((($likes*100) / $total), 0);
        }else{
            $porcentajeDeLikes = 0;
        }

        

        $datosLikes = [
            'porcentajeDeLikes' => $porcentajeDeLikes,
            'total' => $total,
            'idDesafio' => $desafio->id,
            'authUserLike' => $authUserLike,
            'authUserDislike' => $authUserDislike
        ];
    

        $datosLikesJson = json_encode($datosLikes);

        return $datosLikesJson;

        
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
        $like = Like::find($id);
        $like->delete();
    }
}
