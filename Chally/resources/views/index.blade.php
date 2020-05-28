@extends('layouts/plantilla-header')
@section('title' , 'Index - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <section class="hero container-fluid px-5 py-5 py-md-0 ">
        <div class="hero__row row d-flex align-items-center vh-100 flex-wrap">
            <div class="row__col col-12 col-sm-7 col-md-8 col-lg-9">
                <h1 class="col__title text-white display-4 d-none d-md-block">Superá tus límites participando en la primera red social de desafíos digitales</h1>
                <h1 class="col__title text-white d-block d-md-none">Superá tus límites participando en la primera red social de desafíos digitales</h1>
            </div>

            <div class="row__col col-12 col-sm-5 col-md-4 col-lg-3 shadow p-5 d-flex flex-column align-items-center">
                <h3 class="col__title color-verde text-center mb-4">¡Creá tu cuenta ahora!</h3>
                
                
                <form class="formHero w-100" method="GET" action="/index-register">
                    <div class="formHero__inputGroup form-group">
                        <label class="inputGroup__label" for="inputName">Tu nombre</label>
                        <input class="inputGroup__field form-control" type="text" id="inputName" name="nameHero" required>
                    </div>

                    <div class="formHero__inputGroup form-group">
                        <label class="inputGroup__label" for="inputName">Tu apellido</label>
                        <input class="inputGroup__field form-control" type="text" id="inputName" name="lastnameHero" required>
                    </div>

                    <div class="formHero__inputGroup form-group">
                        <label class="inputGroup__label" for="inputMail">Tu mail</label>
                        <input class="inputGroup__field form-control" type="email"  id="inputMail" name="mailHero" required>
                    </div>

                    <button class="formHero__button btn btn--secondary w-100" type="submit">Avanzar</button>
                </form>                
            </div>

        </div> <!-- CIERRE DE ROW HERO -->
    </section> <!-- CIERRE DEL HERO -->

    <section class="pasos container my-5">
        <div class="pasos__row row">
            <div class="row__col col-12">
                <h2 class="col__title color-verde font-weight-bold text-center">Chally es muy simple.</h2>
            </div>

            <div class="row__col col-12 col-sm-4 text-center">
                <img class="col__img my-5" src="img/ico/search.png" alt="Paso 1 - Chally">
                <p class="col__numeroPaso color-verde font-weight-bold mb-0">Paso 1</p>
                <p class="col__descripcionPaso">Buscás desafíos de tu área de interés. ¡También podés crear tu propio desafío!</p>
            </div>

            <div class="row__col col-12 col-sm-4  text-center">
                <img class="col__img my-5" src="img/ico/paper-plane.png" alt="Paso 2 - Chally">
                <p class="col__numeroPaso color-verde font-weight-bold mb-0">Paso 2</p>
                <p class="col__descripcionPaso">Participás enviando tu respuesta y competís con miles de challengers en todo el mundo</p>
            </div>

            <div class="row__col col-12 col-sm-4  text-center">
                <img class="col__img my-5" src="img/ico/resume.png" alt="Paso 3 - Chally">
                <p class="col__numeroPaso color-verde font-weight-bold mb-0">Paso 3</p>
                <p class="col__descripcionPaso">Además de ejercitar el cerebro y compartir conocimiento, Chally arma tu portfolio profesional en base a tus respuestas.</p>
            </div>
        </div>
    </section> <!-- CIERRE SECCION STEPS -->

    <section class="categorias container-fluid">
        <div class="categorias__row row">
            <div class="row__col col-12 text-center pt-3 pb-3  pt-md-5 pb-md-0">
                <h2 class="col__title text-white font-weight-bold">Tenemos desafíos para todos los gustos.</h2>
            </div>
        </div>

        <div class="categorias__row row">
            <div class="row__container container">
                <div class="container__col col-12 text-center d-none d-md-block">
                    <div id="carouselExampleControls" class="col__carousel carousel slide"  data-ride="carousel"> <!-- data-ride="carousel" Para activar Autoplay -->
                        <div class="carousel__inner carousel-inner carousel-desktop">

                            <div class="carousel__inner__item carousel-item active">
                                <div class="item__row row">
                                    @for($i = 0; $i < 3; $i++)
                                        <div class="row__col col-4 item">
                                            <div class="col__item shadow">
                                                <img class="item__img img-fluid" src="img/{{$categorias[$i % count($categorias)]->imagen}}" alt="Categoria de {{$categorias[$i % count($categorias)]->nombre}} - Chally">
                                                <h3 class="item__nombre pt-3 font-weight-bold">{{$categorias[$i % count($categorias)]->nombre}}</h3>
                                                <p class="item__cantidad">17 Desafíos Abiertos</p>
                                                <br>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel__inner__item carousel-item ">
                                <div class="item__row row">
                                    @for($i = 3; $i < 6; $i++)
                                        <div class="row__col col-4 item">
                                            <div class="col__item shadow">
                                                <img class="item__img img-fluid" src="img/{{$categorias[$i % count($categorias)]->imagen}}" alt="Categoria de {{$categorias[$i % count($categorias)]->nombre}} - Chally">
                                                <h3 class="item__nombre pt-3 font-weight-bold">{{$categorias[$i % count($categorias)]->nombre}}</h3>
                                                <p class="item__cantidad">17 Desafíos Abiertos</p>
                                                <br>
                                            </div>
                                        </div>
                                    @endfor
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

    </section>  <!-- CIERRE CONTENEDOR SECCION CATEGORIAS -->  

    <section class="destacados container my-3 my-md-5 pt-3 pt-md-5">
        <div class="destacados__row row">
            <div class="row__col col-12">
                <h2 class="col__title color-verde">Challys destacados de la Semana</h2>
            </div>

            @for($i = 0; $i < 4; $i++)
            <div class="row__desafios col-lg-3 col-md-6 mb-5 mb-sm-0 ">
                <a class="col__a d-block " href="#">
                    <img class="col__img img-fluid shadow mb-2" src="desafios/<?=$desafios[$i % count($desafios)]->imagen?>" alt="Foto de Desafío">
                    <p class="col__nombre"><?=$desafios[$i % count($desafios)]->nombre?></p>
                    <p class="col__cantidad text-secondary">¡985 challengers participando!</p>
                </a>
            </div>
            @endfor


            <div class="row__col col-12 mt-5 mb-3">
                <h2 class="col__title color-verde">Challengers Destacados del Mes</h2>
            </div>

            @for($i = 0; $i < 4; $i++)
            <div class="row__usuarios col-12 col-md-6 col-lg-3 mb-5 mb-sm-0 text-center">
                <a class="col__a d-block" href="profile.php">
                    <img class="col__img challenger rounded-circle shadow mb-3" src="avatars/{{$usuarios[$i % count($usuarios)]->avatar}}"  alt="Foto de Usuario">
                    <p class="col__nombre">{{$usuarios[$i % count($usuarios)]->nombre . ' ' . $usuarios[$i % count($usuarios)]->apellido}}
                    <p class="col__cantidad">{{$usuarios[$i % count($usuarios)]->username}}</p>
                </a>
            </div>
            @endfor
            

        </div>
    </section> <!-- CIERRE SECCION DE DESTACADOS -->


    <section class="faq container-fluid vh-100">
        <div class="faq__row row vh-100 justify-content-center justify-content-lg-end align-items-center px-5">
            <div class="row__col col-12 col-md-8 col-lg-4">
                <h3 class="text-white">Algunas preguntas frecuentes</h3>    
                <div class="col__acordeon accordion" id="accordionExample">

                    <div class="acordeon__item card">

                        <div class="item__header card-header" id="headingOne">
                            <h2 class="header__pregunta mb-0">
                                <button class="pregunta__boton btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Necesito estar registrado para usar Chally?
                                </button>
                            </h2>
                        </div>

                        <div class="item__body collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="body__respuesta card-body">
                                Podés usar Chally y ver todos los desafíos disponibles sin estar registrado. Sin embargo, deberías registrarte para poder crear desafíos, enviar tus participaciones y empezar a organizar tu portfolio. 
                            </div>
                        </div>

                    </div>

                    <div class="acordeon__item card">

                        <div class="item__header card-header" id="headingOne">
                            <h2 class="header__pregunta mb-0">
                                <button class="pregunta__boton btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Chally es gratis?
                                </button>
                            </h2>
                        </div>

                        <div class="item__body collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="body__respuesta card-body">
                                ¡Así es! Chally es y será 100% gratis.
                            </div>
                        </div>
                        
                    </div>

                    <div class="acordeon__item card">

                        <div class="item__header card-header" id="headingOne">
                            <h2 class="header__pregunta mb-0">
                                <button class="pregunta__boton btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿De qué me sirve tener un perfil en Chally?
                                </button>
                            </h2>
                        </div>

                        <div class="item__body collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="body__respuesta card-body">
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