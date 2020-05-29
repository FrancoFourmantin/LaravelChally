<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Session\Session;
use App\Usuario;
use App\Desafio;
use App\Amistad;
use App\Respuesta;
use App\Categoria;
use App\Http\Controllers\AmistadController;
use Illuminate\Support\Facades\Validator;
use App\VotoRespuesta;

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
        $puede_editar = false;
        if(Auth::user()){
            if ($username == Auth::user()->username) {
                $puede_editar = true;
            }
        }
        
        
        
        $usuario = Usuario::where('username', 'like', $username)->first();
        $id_usuario = $usuario->id_usuario;
        $desafios = Desafio::all()->where('id_autor', $id_usuario);
        $respuestas = Respuesta::all()->where('id_autor',$id_usuario);
        $countRespuestas = count($respuestas);
        $countDesafios = count($desafios);
        if(Auth::user()){
            $amistad = AmistadController::verificarAmistad(Auth::user()->id_usuario, $id_usuario);
        }else{
            $amistad = "not amigos";
        }
        
        $amistades = Amistad::where('id_usuario_1' , $id_usuario)->get();
        $amigos = [];
        
        foreach($amistades as $amistad) {
            if($amistad->id_usuario_1 == $id_usuario) {
                if(Amistad::where('id_usuario_1', $amistad->id_usuario_2)->get()->count() > 0)
                $amigos[] = Usuario::find($amistad->id_usuario_2);
            }
        }
        
        $vac = compact('usuario', 'puede_editar', 'desafios','respuestas', 'countDesafios', 'countRespuestas', 'amistad' , 'amigos');
        
        return view('perfil', $vac);
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
        $categorias = Categoria::all();
        $vac = compact('usuario' , 'categorias');
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
            'password' => ['string', 'min:8', 'confirmed','nullable'],
            'cover' => ['image', 'mimes:jpeg,png,jpg,bmp', 'max:5000', 'nullable'],
            'bio' => ['string', 'max:1000'],
            'link_linkedin' => ['string','nullable'],
            'link_behance' => ['string','nullable'],
            'link_github' => ['string','nullable'],
            'link_website' => ['string','nullable']                      
            
        ], $messages);
        
        
        $id = $request['id_usuario'];
        
        $usuario = Usuario::find($id);
        if ($request->file('avatar')) {
            $avatarName = time() . '.' . request()->avatar->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('avatars'), $avatarName);
        } else {
            $avatarName = Auth::user()->avatar;
        }
        
        
        if ($request->file('cover')) {
            $coverName = time() . '.' . request()->cover->getClientOriginalExtension();
            $request->file('cover')->move(public_path('covers'), $coverName);
        } else {
            $coverName = Auth::user()->cover;
        }
        
        if($request->input('password')){
            $usuario->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        }
        
        
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->avatar = $avatarName;
        $usuario->cover = $coverName;
        $usuario->bio = $request->input('bio');
        $usuario->link_linkedin = $request->input('link_linkedin');
        $usuario->link_behance = $request->input('link_behance');
        $usuario->link_github = $request->input('link_github');
        $usuario->link_website = $request->input('link_website');
        
        
        
        $usuario->save();
        
        $mensajeExito = "Perfil actualizado con exito";
        
        return redirect('/usuario/' . $usuario->username);
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
    
    
    public function mostrarDesafiosPendientes(){
        $desafiosPendientes = [];
        if(Auth::user()){
            $respuestas = Auth::user()->getRespuestas;
            foreach($respuestas as $respuesta){
                if($respuesta->getDesafio->estado_votaciones === 1){

                    $votoUsuario = VotoRespuesta::where('id_votante' , '=' , Auth::user()->id_usuario)
                                                ->where('id_desafio' , '=' , $respuesta->getDesafio->id)
                                                ->first();
                    
                    if($votoUsuario == null){
                        $desafiosPendientes[] = $respuesta->getDesafio; 
                    }
                }
            }

      
            return view('desafio.votaciones-pendientes' , compact('desafiosPendientes'));
        }
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
