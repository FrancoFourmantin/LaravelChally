@extends('layouts/plantilla')
@section('title' , 'Login - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0&appId=246970620014074&autoLogAppEvents=1"></script>


<div class="contenedor-principal-login">
    <div class="contenedor-form-login rounded shadow my-4 container text-center d-block p-5">
        <form action="{{ route('login') }}" method="POST" id="form-login" name="form-login">
            @csrf
            <div class="contenedor-logo">
                <a class="navbar-brand" href="index.php"><img src="img/logo_chally.svg" alt=""></a>
            </div>

            <h3>Iniciar sesión</h3>
            <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Correo electrónico"
                required><br>
            <input type="password" id="pass" name="password" placeholder="Contraseña" @error('password') is-invalid
                @enderror required>
            @if($errors)
            <span class="text-danger">
                {{ $errors->first() }}
            </span>
            @endif
            <p id="error-ingreso" class="fuente-chica" name="error-ingreso"></p>
            <p id="checkbox-recordar"><input type="checkbox" name="remember" id="remember"><label for="recordar"
                    class="fuente-chica" {{ old('remember') ? 'checked' : '' }}>Recordarme</label></p>
            <input type="submit" id="boton-ingresar" value="Ingresar">
            <p id="olvido-password" class="fuente-chica"><a href="/" class="text-secondary">¿Olvidaste tu
                    contraseña?</a></p>
            <p id="registrarse" class="fuente-chica"><a href="/register" class="font-weight-bold d-inline-block"
                    alt="Enlace a la página de registro">¿No tienes cuenta? Regístrate aquí.</a></p>

                    {{-- <a href="auth/facebook"><img class="img-fluid" src="img/facebook-button.png" alt=""></a> --}}
                    <a href="auth/facebook"><img class="mb-2 text-center d-block mx-auto" style="width:50%" src="img/facebook-button.png" alt=""></a>
                    <a href="auth/google"><img class="text-center d-block mx-auto shadow" style="width:50%" src="img/google-button.png" alt=""></a>
                    <!--<div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-width=""></div> -->       </form>
    </div>
</div>
@endsection