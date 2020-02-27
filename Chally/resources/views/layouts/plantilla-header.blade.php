<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/959125d25f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
</head>

<body class='@yield('clases-body')'>
    @if (isset($_SESSION))
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/"><img src="img/logo_chally.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav ml-auto align-items-center">
                
                
                <li class="nav-item" id="post-cta">
                    <a class="nav-link" href="create-post.php"><i class="fas fa-plus"></i> &nbsp; Crear Desafío</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/feed"><i class="fas fa-newspaper"></i> &nbsp; Inicio</a>
                </li>
                
                <li class="nav-item"> 
                    <a class="nav-link" href="/perfil"><i class="fas fa-user"></i> &nbsp; @yield('nombre') @yield('apellido')</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i>&nbsp; Notificaciones</a>
                </li>        
                
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-comments"></i>&nbsp; Chat</a>
                </li>        
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/modificar-perfil"><i class="fas fa-cog"></i> Modificar perfil</a>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-times"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
        @else
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
            <a class="navbar-brand" href="/"><img src="img/logo_chally.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php"><i class="fas fa-question"></i> &nbsp; Preguntas Frecuentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-user"></i> &nbsp; Registrarse / Iniciar Sesión</a>
                    </li>
                    
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
                            <p>Chally permite que pongas a prueba tus aptitudes creativas con el único fin de constituir un portfolio, aprender y divertirte. <br><br> Somos un excelente punto de partida para que armes un portfolio desde cero así lo presentás en entrevistas de trabajo, o simplemente podés resolver desafíos para mantener tus habilidades siempre afiladas.
                                
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
                            <a href="index.php">Home</a><br>
                            <a href="login.php">Iniciar Sesión / Registrarse</a><br>
                            <a href="faq.php">Preguntas Frecuentes</a><br>
                            <a href="contacto.php">Contacto</a><br>
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
        
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>