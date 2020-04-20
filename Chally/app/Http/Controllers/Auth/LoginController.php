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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/feed';

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();
        
        if ($user = Usuario::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  

            $avatarContents = file_get_contents($social_user->avatar);
            File::put(public_path('avatars') . '/avatars' . time() . ".jpg", $avatarContents);

            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = Usuario::create([
                'nombre' => $social_user->name,
                //'apellido' => $social_user->name,
                'email' => $social_user->email,
                'avatar' => "avatars" . time() . ".jpg",
                'username' => strtolower(str_replace(' ', '', $social_user->name)),
            ]);
            
            Cookie::queue('respondio_intereses' , 'false'  , 21600);

            return $this->authAndRedirect($user); // Login y redirección
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
