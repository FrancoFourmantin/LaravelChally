@extends('layouts/plantilla-header')
@section('title' , 'Index - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <section class="container-fluid px-5 py-5 py-md-0 hero">
        <div class="row d-flex align-items-center vh-100 flex-wrap">
            <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                <h1 class="text-white display-4 d-none d-md-block">Superá tus límites participando en la primera red social de desafíos digitales</h1>
                <h1 class="text-white d-block d-md-none">Superá tus límites participando en la primera red social de desafíos digitales</h1>
            </div>

            <div class="col-12 col-sm-5 col-md-4 col-lg-3 shadow hero-form p-5 d-flex flex-column align-items-center">
                <img class="mb-4" src="img/logo_c.svg" alt="Logo Chally">
                <h3 class="color-verde text-center mb-4">¡Creá tu cuenta ahora!</h3>
                
                
                <form class="w-100" method="GET" action="/index-register">

                <div class="form-group">
                    <label for="inputName">Tu nombre</label>
                    <input type="text" class="form-control" id="inputName" name="nameHero" required>
                </div>

                <div class="form-group">
                    <label for="inputName">Tu apellido</label>
                    <input type="text" class="form-control" id="inputName" name="lastnameHero" required>
                </div>

                <div class="form-group">
                    <label for="inputMail">Tu mail</label>
                    <input type="email" class="form-control" id="inputMail" name="mailHero" required>
                </div>

                <button class="btn btn-secondary w-100" type="submit">Avanzar</button>
                </form>                
            </div>

            <div class="col-3 position-absolute d-none"> <!-- Implementar en otro momento -->
                <img src="" alt="">
                <p>@mark78 - Diseñador Web</p>
            </div>

        </div> <!-- CIERRE DE ROW HERO -->
    </section> <!-- CIERRE DEL HERO -->

    <section class="container pasos my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="color-verde font-weight-bold text-center">Chally es muy simple.</h2>
            </div>

            <div class="col-12 col-sm-4 text-center">
                <img class="my-5" src="img/ico/search.png" alt="Paso 1 - Chally">
                <p class="color-verde font-weight-bold mb-0">Paso 1</p>
                <p>Buscás desafíos de tu área de interés. ¡También podés crear tu propio desafío!</p>
            </div>

            <div class="col-12 col-sm-4  text-center">
                <img class="my-5" src="img/ico/paper-plane.png" alt="Paso 2 - Chally">
                <p class="color-verde font-weight-bold mb-0">Paso 2</p>
                <p>Participás enviando tu respuesta y competís con miles de challengers en todo el mundo</p>
            </div>

            <div class="col-12 col-sm-4  text-center">
                <img class="my-5" src="img/ico/resume.png" alt="Paso 3 - Chally">
                <p class="color-verde font-weight-bold mb-0">Paso 3</p>
                <p>Además de ejercitar el cerebro y compartir conocimiento, Chally arma tu portfolio profesional en base a tus respuestas.</p>
            </div>

        
        </div>
    </section> <!-- CIERRE SECCION ACERCA DE CHALLY STEPS -->

    <section class="container-fluid categorias">
        <div class="row">
            <div class="col-12 text-center pt-3 pb-3  pt-md-5 pb-md-0">
                <h2 class="text-white font-weight-bold">Tenemos desafíos para todos los gustos.</h2>
            </div>
        </div>
                <div class="row">
                    <div class="container">
                    <div class="col-12 text-center d-none d-md-block">
                                <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel"> <!-- data-ride="carousel" Para activar Autoplay -->
                                    <div class="carousel-inner carousel-desktop">
                                        <div class="carousel-item active">
                                            <div class="row">
                                            @foreach($categorias as $categoria)
                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/{{$categoria->imagen}}" alt="Categoria de {{$categoria->nombre}} - Chally">
                                                        <h3 class="pt-3 font-weight-bold">{{$categoria->nombre}}</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>
                                            @endforeach

                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                            @foreach($categorias as $categoria)
                                                <div class="col-4 item">
                                                    <div class="cont shadow">
                                                        <img class="img-fluid" src="img/{{$categoria->imagen}}" alt="Categoria de {{$categoria->nombre}} - Chally">
                                                        <h3 class="pt-3 font-weight-bold">{{$categoria->nombre}}</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>

                                                </div>
                                            @endforeach

                                            </div>
                                        </div>


                                    </div>
                                    <a class="carousel-control-prev desktop" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon desktop" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next desktop" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon desktop" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>  <!-- CIERRE CARRUSEL -->            
                            </div>    
                    </div>
                </div> <!-- CIERRE CONTAINER CARRUSEL -->

                <div class="col-12 d-block d-md-none text-center pb-5">
                    
                <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel"> <!-- data-ride="carousel" Para activar Autoplay -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row d-flex justify-content-center">
                                                <div class="col-10 item pb-3">
                                                    <div class="cont shadow bg-white">
                                                        <img class="img-fluid" src="img/categoria-diseno.jpg" alt="Categoria de Diseño - Chally">
                                                        <h3 class="pt-3 px-2 font-weight-bold">Diseño y Arte</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4 mx-3" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>
                                                </div>                                               
                            </div>
                        </div>


                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center">
                                                <div class="col-10 item pb-3">
                                                    <div class="cont shadow bg-white">
                                                        <img class="img-fluid" src="img/categoria-fotografia.jpg" alt="Categoria de Fotografía - Chally">
                                                        <h3 class="pt-3 font-weight-bold">Fotografía</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>
                                                </div>                                               
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center">
                                                <div class="col-10 item pb-3">
                                                    <div class="cont shadow bg-white">
                                                    <img class="img-fluid" src="img/categoria-programacion.jpg" alt="Categoria de Programación - Chally">
                                                        <h3 class="pt-3 font-weight-bold">Programación y Lógica</h3>
                                                        <p class="text-secondary">4258 Desafíos Abiertos</p>
                                                        <a class="btn btn-secondary mb-4" href="#">Ver Desafíos Destacados</a>                                                    
                                                    </div>
                                                </div>                                               
                            </div>
                        </div>


                    </div>
                </div>

                    


            
    </section>  <!-- CIERRE CONTENEDOR SECCION CATEGORIAS -->  

    <section class="container destacados my-3 my-md-5 pt-3 pt-md-5">
        <div class="row">
            <div class="col-12">
                <h2 class="color-verde">Challys destacados de la Semana</h2>
            </div>

            @foreach($desafios as $desafio)
                <div class="col-lg-3 col-md-6 mb-5 mb-sm-0 ">
                <a  class="d-block" href="#">
                    <img src="desafios/{{$desafio->imagen}}" class="img-fluid shadow mb-2" alt="Foto de Desafío">
                    <p>{{$desafio->nombre}} </p>
                    <p class="text-secondary">¡985 challengers participando!</p>
                </a>
                </div>
            @endforeach

            <div class="col-12 mt-5 mb-3">
                <h2 class="color-verde">Challengers Destacados del Mes</h2>
            </div>

            @foreach($usuarios as $usuario)
                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-sm-0 text-center">
                    <a class="d-block" href="profile.php">
                        <img src="avatars/{{$usuario->avatar}}" class="challenger rounded-circle shadow mb-3" alt="Foto de Usuario">
                        <p>{{$usuario->nombre . ' ' . $usuario->apellido}} <br>{{$usuario->username}}</p>
                        <a class="btn btn-secondary" href="">Seguir</a>
                    </a>
                </div>
            @endforeach
            

        </div>
    </section> <!-- CIERRE SECCION DE DESTACADOS -->


    <section class="container-fluid faq vh-100">
        <div class="row vh-100 justify-content-center justify-content-lg-end align-items-center px-5">
            <div class="col-12 col-md-8 col-lg-4">
            <h3 class="text-white">Algunas preguntas frecuentes</h3>    
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Necesito estar registrado para usar Chally?
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Podés usar Chally y ver todos los desafíos disponibles sin estar registrado. Sin embargo, deberías registrarte para poder crear desafíos, enviar tus participaciones y empezar a organizar tu portfolio. 
                            </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Chally es gratis?
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                ¡Así es! Chally es y será 100% gratis.
                            </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿De qué me sirve tener un perfil en Chally?
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Tener un perfil en Chally te va a permitir contar con un portfolio profesional en el cual mostrar todos tus trabajos más destacados. 
                            </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-secondary mt-3 w-100" href="/faq">Ver más </a>
            </div>
        </div>
    </section> <!-- CIERRE SECCION PREGUNTAS -->

@endsection