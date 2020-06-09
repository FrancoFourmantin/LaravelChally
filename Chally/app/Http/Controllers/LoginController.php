<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $usuario = Usuario::where('email',$request->email)->first();

            if($usuario->email_verified_at != NULL){
                return "true";
            }
            return "false-not-activated";

        }
        else{
            return "false-incorrect";
            //return redirect()->back();
        }
    }
}