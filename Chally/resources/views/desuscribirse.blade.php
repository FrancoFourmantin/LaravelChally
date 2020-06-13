@extends('layouts\plantilla-header')
@section('title' , "Chally - Desuscribirse del newsletter")
@section('clases-body' , "animated fadeIn")
@section('main')
    <main class="container">
        <section class="row d-flex justify-content-center">
            <div class="col-md-6 vh-100 text-center">

                @if($result == "failure")
                    <img class="img-fluid" src="{{ asset("img/emails/unsub_failure.png")}}" alt="">
                    <h2 class="color-verde">Enlace inválido</h2>    
                    <p>El enlace de desuscripción es incorrecto o bien ya te desuscribiste correctamente con anterioridad.</p>
                    @if(Auth::user())
                        <a class="btn btn-secondary" href="{{url('/editar-perfil')}}">Ver mis preferencias de suscripción</a>
                    @endif

                @else
                    <img class="img-fluid" src="{{ asset("img/emails/unsub_success.png")}}" alt="">
                    <h2 class="color-verde">¡Desuscripción Completada!</h2>    
                    <p>Lamentamos que te hayas desuscrito. Recordá que podés volver a suscribirte desde las opciones de tu perfil.</p>
                    @if(Auth::user())
                        <a class="btn btn-secondary" href="{{url('/editar-perfil')}}">Modificar preferencias de suscripción</a>
                    @endif
                @endif
            </div>
        </section>
    </main>
@endsection
    