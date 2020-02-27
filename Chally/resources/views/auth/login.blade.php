@extends('layouts/plantilla')
@section('title' , 'Login - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')
   
    <div class="contenedor-principal-login">
        <div class="contenedor-form-login rounded shadow my-4 container text-center d-block p-5">
            <form action="{{ route('login') }}" method="POST" id="form-login" name="form-login">
                @csrf
                <div class="contenedor-logo">
                    <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
                </div>

                <h3>Iniciar sesión</h3>
                <input type="mail" id="email" name="mail" value="{{old('mail')}}" placeholder="Correo electrónico" required><br>
                @error('mail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="password" id="pass" name="password" placeholder="Contraseña" @error('password') is-invalid @enderror required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <p id="error-ingreso" class="fuente-chica" name="error-ingreso"></p>
                <p id="checkbox-recordar"><input type="checkbox" name="remember" id="remember"><label for="recordar" class="fuente-chica" {{ old('remember') ? 'checked' : '' }}>Recordarme</label></p>
                <input type="submit" id="boton-ingresar" value="Ingresar">
                <p id="olvido-password" class="fuente-chica"><a href="/" class="text-secondary">¿Olvidaste tu contraseña?</a></p>       
                <p id="registrarse" class="fuente-chica"><a  href="/register" class="font-weight-bold d-inline-block" alt="Enlace a la página de registro">¿No tienes cuenta? Regístrate aquí.</a></p>
            </form>
        </div>
    </div>
@endsection