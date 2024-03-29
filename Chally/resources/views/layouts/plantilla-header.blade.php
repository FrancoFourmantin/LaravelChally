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




<body class='@yield('clases-body')'>
    @include('layouts/modal-registro')
    
    @if (Auth::user() != null)
    
    
    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/"><img src="{{asset(('img/logo_chally.svg'))}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        
        
        <ul class="navbar-nav ml-auto align-items-center">
            
            <li class="nav-item" id="search">
                
                <form class="form-search" action=""  method="GET">
                    <div class="search-contenedor d-flex justify-content-end">
                        <input class="input-search"type="search" placeholder="Programación">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    <table class="table-search position-absolute">
                        <thead>
                            <tr>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody class="w-100">
                            <tr class="resultado-title" data-referencia="categorias">
                                <td>Categorias</td>
                            </tr>
                            
                            <tr class="resultado-title" data-referencia="usuarios">
                                <td>Usuarios</td>
                            </tr>
                            
                            <tr class="resultado-title" data-referencia="link">
                                <td ><a class="link-search-navbar" href="/resultados-busqueda">Ver más <i class="fas fa-plus"></i></a></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    
                </form>
            </li>
            
            
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
                <a class="nav-link" href="/usuario/{{Auth::user()->username}}/bookmarks"><i class="fas fa-bookmark"></i> &nbsp; Guardados</a>
            </li>
            
            
            
            <li class="nav-item">
                <a class="nav-link" href="/usuario/{{ Auth::user()->username}}"><i class="fas fa-user"></i> &nbsp;
                    {{ Auth::user()->nombre }}
                    {{ Auth::user()->apellido }}</a>
                </li>
                
                <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i>&nbsp; Notificaciones</a>
                    </li>
                -->
                
                <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-comments"></i>&nbsp; Chat</a>
                    </li>-->
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/editar-perfil"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();"><i
                        class="fas fa-pen"></i> Modificar perfil</a>
                        @if (Auth::user()->role == 'admin')
                        <a href="/categorias" class="dropdown-item">
                            <i class="fas fa-pen"></i> Modifcar categorias</a>
                            @endif
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
                <ul class="navbar-nav ml-auto align-items-center">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/feed"><i class="fas fa-newspaper"></i> &nbsp; Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq"><i class="fas fa-question"></i> &nbsp; Preguntas Frecuentes</a>
                    </li>
                    <li class="nav-item p-2">
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#enter">                        
                            <i class="fas fa-user"></i> Iniciar Sesión
                        </button>
                    </li>
                    
                    
                    <!-- Modal para iniciar sesión/registrarse -->
                    <div class="modal fade" id="enter" tabindex="-1" role="dialog" aria-labelledby="enter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title w-100" id="exampleModalLongTitle">Iniciá Sesión</h5>
                                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>-->
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="container social-login">
                                        <div class="row text-center mb-4">
                                            
                                            <div class="col-5 py-2 rounded facebook">
                                                <a href="{{url("auth/facebook")}}"><i class="fab fa-facebook-f text-white w-100"></i></a>
                                            </div>
                                            
                                            <div class="offset-md-2"></div>
                                            
                                            <div class="col-5 py-2 bg-danger rounded google">
                                                <a href="{{url("auth/google")}}"><i class="fab fa-google text-white w-100"></a></i>                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <form action="processlogin" method="POST">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        
                                        @csrf
                                        
                                        
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control" type="text" name="email" id="email_modal" placeholder="Tu email">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>                       
                                                    </div>
                                                </div>
                                                <input class="form-control" type="password" name="password" id="password_modal" placeholder="Tu contraseña">
                                            </div>
                                            <button class="btn btn-secondary w-100 mt-4" type="submit" id="submit_modal">Iniciar Sesión</button>
                                        </div>
                                        
                                    </form>
                                    <p id="olvido-password" class="fuente-chica text-center"><a href="{{url("password/reset")}}" class="text-secondary">¿Olvidaste tu
                                        contraseña?</a></p>
                                        
                                        <hr>
                                        
                                        <p id="registrarse" class="fuente-chica text-center"><a href="{{url("register")}}" class="font-weight-bold d-inline-block"
                                            alt="Enlace a la página de registro">¿No tenés cuenta? Registrate ahora.</a></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </ul>
                    </div>
                </nav>
                @endif
                
                
                @yield('main')
                
                
                <footer class="container-fluid pt-5">
                    <div class="row no-gutters">
                        <div class="container">
                            <div class="row pb-5">
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <h4>Acerca de Chally</h4>
                                    <p>Chally permite que pongas a prueba tus aptitudes creativas con el único fin de constituir un
                                        portfolio, aprender y divertirte. <br><br> Somos un excelente punto de partida para que
                                        armes un portfolio desde cero así lo presentás en entrevistas de trabajo, o simplemente
                                        podés resolver desafíos para mantener tus habilidades siempre afiladas.
                                        
                                    </p>
                                </div>
                                
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <h4>Categorías</h4>
                                    <a href="#">Arte y Diseño</a><br>
                                    <a href="#">Programación y Lógica</a><br>
                                    <a href="#">Fotografía</a><br>
                                    <a href="#">Moda </a><br>
                                    <a href="#">Storytelling</a>
                                </div>
                                
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <h4>Accesos Rápidos</h4>
                                    <a href="/">Home</a><br>
                                    <a href="/login">Iniciar Sesión / Registrarse</a><br>
                                    <a href="/faq">Preguntas Frecuentes</a><br>
                                    <a href="/contacto">Contacto</a><br>
                                    <a href="#">Política de Privacidad</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row bg-verde text-center no-gutters">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="py-3 mb-0">Todos los derechos reservados</p>
                        </div>
                    </div>
                </footer>
                
                
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
    <script src="{{asset('js/login_functions.js')}}"></script>
    
    @if(!Auth::check())
    <script src="{{asset('js/js-cookie/src/js.cookie.js')}}"></script>
    <script  src="{{asset('js/handle_functions.js')}}"></script>
    @endif
    <script src="{{asset('js/buscador_functions.js')}}"></script>
    @include('sweetalert::alert')
</body>

</html>