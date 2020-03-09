<?php

namespace App\Http\Controllers;

use Auth;
use App\Usuario;
use Illuminate\Http\Request;
use App\Amistad;
use Carbon\Carbon;

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
        $amistad = Amistad::where('id_usuario_1', $id_usuario_1)->first();

        if ($amistad) {
            if ($amistad->id_usuario_2 == $id_usuario_2 && $amistad->updated_at == null) {
                //solicitud enviada pero no aceptada
                return "enviada";
            }

            if ($amistad->id_usuario_2 == $id_usuario_2 && $amistad->updated_at != null) {
                return "amigos";
            }
        }

        return "not amigos";
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
