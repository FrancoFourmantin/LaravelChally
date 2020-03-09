<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Session\Session;
use App\Usuario;
use App\Desafio;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $vac = compact('usuarios');
        return $vac;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($username)
    {
        
        if($username == Auth::user()->username){
            $puede_editar = true;
        }else{
            $puede_editar = false;
        }


        $usuario = Usuario::where('username' , 'like', $username)->first();
        $id_usuario = $usuario->id_usuario; 
        $desafios = Desafio::all()->where('id_autor' , $id_usuario);
        $countDesafios = count($desafios);
        $vac = compact('usuario' ,'puede_editar', 'desafios' ,'countDesafios');
        
        return view('perfil' , $vac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id =  $request->input('id_usuario');
        $usuario = Usuario::find($id);
        $vac = compact('usuario');
        return view('/editar-perfil', $vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request['id_usuario'];

        $usuario = Usuario::find($id);
        if ($request->file('avatar')) {
            $avatarName = time() . '.' . request()->avatar->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('avatars'), $avatarName);
        } else {
            $avatarName = Auth::user()->avatar;
        }

        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->avatar = $avatarName;
        $usuario->password = password_hash($request->input('password'), PASSWORD_DEFAULT);

        $usuario->save();

        $mensajeExito = "Perfil actualizado con exito";

        return redirect('/editar-perfil')->with("mensajeExito", $mensajeExito);
    }

    protected function updateValidator(Request $request)
    {

        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser una fecha',
            'mimes' => 'El campo :attribute debe ser :mimes',
            'unique' => 'El campo :attribute ya existe en la base de datos',
            'confirmed' => 'Los campos deben conincidir',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'not_in' => 'El campo :attribute no puede quedar vacio',
            'accepted' => 'Debes aceptar este campo para poder continuar',
        ];


        $request->validate([
            'nombre' => ['min:1', 'string', 'max:255'],
            //'username' => ['required' , 'string' , 'max:255'],
            'apellido' => ['min:1', 'string', 'max:255'],
            //'fecha_nacimiento' => ['required' , 'date'],
            //'sexo' => ['required', 'not_in:0'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,bmp', 'max:5000', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ], $messages);

        return $this->update($request);
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
