@extends('layouts.plantilla-header')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-6 col-lg-5">


            @if (session('status'))
                <img class="img-fluid" src="{{asset('img/emails/email_verification.jpg')}}" alt="">

                <h2 class="color-verde">Revisa tu casilla de mail</h2>
                <p class="font-weight-bold">Acabamos de enviar el mail a tu casilla. Si no lo encontrás te recomendamos verificar la casilla de Spam</p>       

            @else 
                <img class="img-fluid" src="{{asset('img/emails/unsub_failure.png')}}" alt="">

                <h2 class="color-verde">¿Olvidaste tu contraseña?</h2>
                <p class="font-weight-bold">Ingresa tu mail, te reenviaremos las instrucciones de recuperación</p>         
    
    
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
    
                    <div class="form-group row text-center">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autofocus placehoder="Tu mail">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>¡Ups! No encontramos ninguna cuenta registrada con ese mail.</strong>
                                </span>
                            @enderror
                    </div>
    
                    <div class="form-group row mb-0 justify-content-center">
                            <button type="submit" class="btn btn-secondary">
                                Recuperar contraseña
                            </button>
                    </div>
                </form>     

            @endif


       
                    



        </div>
    </div>
</div>
@endsection


