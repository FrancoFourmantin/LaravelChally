<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Usuario;
use Auth;
use File;
use Cookie;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // Si el usuario no está verificado, no loguearlo.
    protected function authenticated(Request $request, $user)
    {   
        if($user->verified==false) {
            \Auth::logout();
            return redirect('/login');
        } else{
            setcookie("register", "", time() - 3600);
            return redirect('/hola');
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/feed';

    /**
     * Create a new controller instance.
     *
     * @return void
     */





    /**
     * Redirect the user to the authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();
        $avatarContents = file_get_contents($social_user->avatar);
        File::put(public_path('avatars') . '/avatars' . time() . ".jpg", $avatarContents);
        $avatarURL="avatars" . time() . ".jpg";

        // Esto está comentado para probar rápido el registro para pruebas.
        if ($user = Usuario::where('email', $social_user->email)->first()  /* 0>1 */ ) { 
            return $this->authAndRedirect($user); 
        } else {  
        
        $vac=compact("social_user","avatarURL");
        return view('auth.register_social',$vac);

            /*
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = Usuario::create([
                'nombre' => $social_user->name,
                'apellido' => $social_user->name,
                'email' => $social_user->email,
                'avatar' => "avatars" . time() . ".jpg",
                'username' => strtolower(str_replace(' ', '', $social_user->name)),
            ]);
            Cookie::queue('respondio_intereses' , 'false'  , 21600);

            return $this->authAndRedirect($user); 

        }   */   
        
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/feed');
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
