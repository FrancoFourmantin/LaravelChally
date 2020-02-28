<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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
            'accepted' => 'Debes aceptar este campo para poder continuar'
        ];

        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'username' => ['required' , 'string' , 'max:255'],
            'apellido' => ['required' , 'string' , 'max:255'],
            'fecha_nacimiento' => ['required' , 'date'],
            'sexo' => ['required', 'not_in:0'],
            //'avatar' => ['required','mimes:jpeg,png,jpg,bmp','max:5000'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios' , 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tyc_check' => ['accepted'],
            'intereses' => ['required', 'array' , 'min:1']
        ], $messages);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    protected function create(array $data)

    {
        return Usuario::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo' => $data['sexo'],
            'apellido' => $data['apellido'],
            'username' => $data['username']
        ]);
    }

    public function mostrarRegistroConDatos(Request $data){
        $nameHero = $data->input('nameHero');
        $lastnameHero = $data->input('lastnameHero');
        $mailHero = $data->input('mailHero');
        $vac = compact('nameHero' , 'lastnameHero' , 'mailHero');
        return view('auth/register' , $vac);
    }
}
