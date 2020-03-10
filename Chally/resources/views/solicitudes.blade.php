@extends('layouts/plantilla-header')
@section('title', 'Solicitudes')
@section('clases-body' , 'perfil animated fadeIn')

@section('main')
    

  <!--Seccion PORTADA -->
  


  <!--Fin Seccion PORTADA -->
    @if(isset($usuarios))
  <!--Seccion Amigos -->
  <div class="contenedor-amigos container">
    @foreach($usuarios as $usuario)
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
            <img class="foto-perfil" src="{{asset("avatars/$usuario->avatar")}}">
                 <h6 class="nombre">{{$usuario->nombre}} {{$usuario->apellido}}</h6>
                <h6 class="nombre-usuario">{{$usuario->username}}</h6>
                <div>
                    <a class="boton-mensaje" href="/usuario/{{$usuario->username}}/aceptar">Aceptar</a>
                    <a class="estado-amigo" href="/usuario/{{$usuario->username}}/rechazar">Rechazar</a>
                </div>
            <a class="ver-perfil" href="/usuario/{{$usuario->username}}">Ver Perfil</a>
            </div>
        </div>  
    @endforeach
    </div>
    
    @else
    
    
    
    <div class="col-12 text-center bg-success text-white rounded py-3 mb-2 mt-2">
        Parece que no tienes solicitudes de amistad pendientes :):)
    </div>
    
</div>
@endif

@endsection