@extends('layouts.plantilla-header')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-12">

            <img class="img-fluid" src="{{asset('img/emails/email_verification.jpg')}}" alt="">

            @if(isset($result))
                @if($result == "failure")
                        <h2 class="text-danger">Enlace inválido</h2>
                        <p class="font-weight-bold">El usuario ya se encuentra activado o bien el token insertado no es válido.</p>         
                        
                        <div class="mt-5">
                            <p class="fuente-chica text-muted mb-2">¿No encontraste el mail en tu casilla?</p>
                            <form class="d-inline" method="POST" action="">
                                @csrf
                                <button type="submit" class="btn  btn-outline-success">Reenviar Mail</button>
                            </form>
                        </div>

                @elseif($result == "success")
                    <h2 class="color-verde">¡Cuenta verificada!</h2>
                    <p class="font-weight-bold">¡Ya podés iniciar sesión en Chally!</p>         

                    <button class="btn btn-secondary" data-toggle="modal" data-target="#enter">                        
                        Iniciar Sesión
                    </button>
                    
                    @endif

            @else

                <h2 class="color-verde">¡Ya casi está todo listo!</h2>
                <p class="font-weight-bold">Te acabamos de enviar un mail a tu casilla para que actives tu cuenta.</p>

                <div class="mt-5">
                    <p class="fuente-chica text-muted mb-2">¿No encontraste el mail en tu casilla?</p>
                    <form class="d-inline" method="POST" action="">
                        @csrf
                        <button type="submit" class="btn  btn-outline-success">Reenviar Mail</button>
                    </form>
                </div>

            @endif
                    
                    



        </div>
    </div>
</div>
@endsection
