<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/959125d25f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png')}}" />


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>

<body class='@yield(' clases-body')'>
    @include('layouts/modal-registro')

    @if (Auth::user() != null)


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/"><img src="{{asset(('img/logo_chally.svg'))}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ml-auto align-items-center">


                <li class="nav-item" id="post-cta">
                    <a class="nav-link" href="/desafio/crear"><i class="fas fa-plus"></i> &nbsp; Crear Desafío</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/feed"><i class="fas fa-newspaper"></i> &nbsp; Inicio</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/usuario/{{Auth::user()->username}}/solicitudes"><i class="fas fa-users"></i> &nbsp; Solicitudes ({{Auth::user()->getSolicitudesDeAmistad()}})</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/usuario/{{ Auth::user()->username}}"><i class="fas fa-user"></i> &nbsp;
                        {{ Auth::user()->nombre }}
                        {{ Auth::user()->apellido }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i>&nbsp; Notificaciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-comments"></i>&nbsp; Chat</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/editar-perfil"
                            onclick="event.preventDefault();document.getElementById('edit-form').submit();"><i
                                class="fas fa-cog"></i> Modificar perfil</a>
                        <form id="edit-form" action="/editar-perfil" method="get" style="display:none">
                            
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id_usuario}}" name="id_usuario">
                        </form>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="fas fa-times"></i> Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/"><img src="{{asset('img/logo_chally.svg')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/faq"><i class="fas fa-question"></i> &nbsp; Preguntas Frecuentes</a>
                </li>
                <li class="nav-item p-2">
                    <i class="fas fa-user color-verde"></i><a style="display: inline" class="nav-link"
                        href="/register">Registrarse </a><a style="display: inline" class="nav-link"
                        href="/login">Iniciar Sesion</a>
                    {{-- <a class="nav-link" href="/register"> &nbsp; Registrarse / Iniciar Sesión</a> --}}
                </li>

            </ul>
        </div>
    </nav>
    @endif


    @yield('main')




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    @if(!Auth::check())
<script src="{{asset('js/handle_functions.js')}}"></script>
@endif
    @include('sweetalert::alert')
</body>

</html>