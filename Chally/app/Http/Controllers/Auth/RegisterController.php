<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\Confirm;
use Illuminate\Support\Str;


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
    protected $redirectTo = '/verificar';

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
            'min' => 'El campo :attribute debe tener un mínimo de :min caracteres',
            'not_in' => 'El campo :attribute no puede quedar vacio',
            'accepted' => 'Debes aceptar este campo para poder continuar',
            'before' => 'La fecha es inválida(debe ser mayor de 13 años)'
        ];

        $date = Carbon::now();
        $before = $date->subYears(13)->format('Y-m-d');


        // Si es de redes sociales, no se valida la password
        if($data['registration_type'] =="social"){
            return Validator::make($data, [
                'nombre' => ['required', 'string', 'min:3', 'max:255'],
                'username' => ['required', 'string', 'min:3', 'max:255'],
                'apellido' => ['required', 'string', 'min:5', 'max:255'],
                'fecha_nacimiento' => ["required", "date", "before:$before"],
                'sexo' => ['required', 'not_in:0'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios', 'confirmed'],
                'tyc_check' => ['accepted'],
            ], $messages);            
        }

        // Si no viene por redes sociales, entonces sí se valida la password
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'apellido' => ['required', 'string', 'min:5', 'max:255'],
            'fecha_nacimiento' => ["required", "date", "before:$before"],
            'sexo' => ['required', 'not_in:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tyc_check' => ['accepted'],
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
        Cookie::queue('respondio_intereses' , 'false'  , 21600);


        $data['verification_token'] = Str::uuid();
        Mail::to($data['email'])->send(new Confirm($data));


        return Usuario::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' =>  $data['registration_type'] == "social" ? NULL : Hash::make($data['password']),
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo' => $data['sexo'],
            'avatar' => $data['registration_type'] == "social" ? $data['avatar'] : 'primera-imagen-hombre.png',
            'apellido' => $data['apellido'],
            'username' => $data['username'],
            'subscribed' => 1,
            'subscription_token' => Str::random(40),
            'verification_token' => $data['verification_token'],
        ]);

    }

    public function mostrarRegistroConDatos(Request $data)
    {
        $nameHero = $data->input('nameHero');
        $lastnameHero = "";
        if($data->input('lastnameHero')){
            $lastnameHero = $data->input('lastnameHero');
        }
        $mailHero = $data->input('mailHero');
        $vac = compact('nameHero', 'lastnameHero', 'mailHero');
        return view('auth/register', $vac);
    }


    // Metodo público del trait RegisterUsers: deshabilito el auto-login tras registrarse
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
    
        event(new Registered($user = $this->create($request->all())));
    
        // $this->guard()->login($user);
    
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }


}

