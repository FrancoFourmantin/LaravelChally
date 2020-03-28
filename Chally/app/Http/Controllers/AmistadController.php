<?php

namespace App\Http\Controllers;

use Auth;
use App\Usuario;
use Illuminate\Http\Request;
use App\Amistad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AmistadController extends Controller
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
    public function store($username)
    {
        //Creamos en la db una nueva fila que va a indicar que se mando la solicitud de amistad
        $id_usuario_1 = Auth::user()->id_usuario;
        $usuario_2 = Usuario::where('username', $username)->first();
        $id_usuario_2 = $usuario_2->id_usuario;
        $nuevaAmistad = new Amistad();
        $nuevaAmistad->id_usuario_1 = $id_usuario_1;
        $nuevaAmistad->id_usuario_2 = $id_usuario_2;
        $nuevaAmistad->created_at = Carbon::now();
        $nuevaAmistad->updated_at = null;
        
        $nuevaAmistad->save();
        
        return redirect("/usuario/$username");
    }
    
    static function verificarAmistad($id_usuario_1, $id_usuario_2)
    {
        if($id_usuario_2 == $id_usuario_1){
            return "persona";
        }

        $amistad = Amistad::where('id_usuario_1', $id_usuario_1)->where('id_usuario_2' , $id_usuario_2)->first();
        
        if ($amistad) {
            
            if ($amistad->id_usuario_2 == $id_usuario_2 && $amistad->updated_at == null) {
                //solicitud enviada pero no aceptada
                return "enviada";
            }
            
            if ($amistad->id_usuario_2 == $id_usuario_2 && $amistad->updated_at != null) {
                return "amigos";
            }
        }else{
            return "not amigos";
        }
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  string $username
    * @return \Illuminate\Http\Response
    */
    public function show(string $username)
    {
        $usuario = Usuario::where('username', $username)->first();
        if($usuario == null)
            return redirect("usuario/" . Auth::user()->username);
        $id_usuario = $usuario->id_usuario;
        $amistades = Amistad::where('id_usuario_1' , $id_usuario)->get();
        $amigos = [];

        foreach($amistades as $amistad) {
            if($amistad->id_usuario_1 == $id_usuario) {
                if(Amistad::where('id_usuario_1', $amistad->id_usuario_2)->get()->count() > 0)
                    $amigos[] = Usuario::find($amistad->id_usuario_2);
            }
        }

        $vac = compact('usuario', 'amigos');

        return view('amigos', $vac);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($username)
    {
        $usuario = Usuario::where('username' , $username)->first();
        $id_usuario_2 = $usuario->id_usuario;
        
        //Todas las solicitudes son aquellas que tengan updated_at en null 
        $solicitudes = Amistad::all()->where('id_usuario_2' , $id_usuario_2)->where('updated_at' , NULL);
        $usuarios = [];
        foreach ($solicitudes as $solicitud) {
            $usuarios[] = Usuario::find($solicitud->id_usuario_1);
        }
        if(!empty($usuarios)){
            return view('solicitudes' , compact('usuarios'));   
        }else{
            return view('solicitudes')->with('mensaje' , "Parece que no tienes ninguna solicitud de amistad pendiente!!");
        }
        
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update($username , $estado )
    {
        $usuario = Usuario::where('username' , $username)->first();
        $id_usuario_1 = $usuario->id_usuario;
        $amistad = Amistad::where('id_usuario_1' ,  $id_usuario_1)->where('id_usuario_2' , Auth::user()->id_usuario)->first();
        $id_amistad = $amistad->id_amistad;
        if($estado == 'aceptar'){
            $amistad->updated_at = Carbon::now();
            $amistad_2 = new Amistad();
            $amistad_2->id_usuario_1 = Auth::user()->id_usuario;
            $amistad_2->id_usuario_2 = $id_usuario_1;
            $amistad_2->created_at = Carbon::now();
            $amistad_2->updated_at = Carbon::now();
            $amistad_2->save();
        }elseif($estado == 'cancelar'){
            $amistad->destroy($id_amistad);
            return redirect("/usuario/" . $username);
        }
        
        $amistad->save();
        
        
        
        return redirect("/usuario/" . Auth::user()->username . "/solicitudes");
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
