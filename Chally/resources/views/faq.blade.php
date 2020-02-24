@extends('layouts/plantilla-header')
@section('title' , 'FAQ - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')



    <section class="container-fluid faq-hero ">
        <div class="row">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 pt-5">
                        <h1 class="text-white">Preguntas Frecuentes de Chally</h1>
                        <h3 class="text-white">¿Cómo podemos ayudarte?</h3>
                    </div>
                </div>

                <div class="row selector-faq position-relative text-center py-5">
                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <a href="#chally">
                            <img class="img-fluid rounded-circle bg-white shadow" src="img/logo_c.svg" alt="Ayuda sobre Chally">
                            <p class="mt-3 color-verde font-weight-bold">Chally</p>
                            <a class="btn btn-secondary" href="#chally">Ver</a>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <a href="#cuenta">
                            <img class="img-fluid rounded-circle bg-white shadow" src="img/ico/account.png" alt="Ayuda sobretu Cuenta">
                            <p class="mt-3 color-verde font-weight-bold">Cuenta</p>
                            <a class="btn btn-secondary" href="#cuenta">Ver</a>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <a href="#desafios">
                            <img class="img-fluid rounded-circle bg-white shadow" src="img/ico/challenges.png" alt="Ayuda sobre Desafíos">
                            <p class="mt-3 color-verde font-weight-bold">Desafíos</p>
                            <a class="btn btn-secondary" href="#desafios">Ver</a>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section class="faq-content container">

        <div class="row" id="chally">
            <div class="col-12 my-5 ">
            <h2 class="color-verde mb-3">Preguntas acerca de Chally</h2>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneChally" aria-expanded="true" aria-controls="collapseOne">
                        ¿Necesito estar registrado para usar Chally?
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOneChally" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Podés usar Chally y ver todos los desafíos disponibles sin estar registrado. Sin embargo, deberías registrarte para poder crear desafíos, enviar tus participaciones y empezar a organizar tu portfolio. 
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoChally" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Chally es gratis?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoChally" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        ¡Así es! Chally es y será 100% gratis.
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeChally" aria-expanded="false" aria-controls="collapseThree">
                        ¿De qué me sirve tener un perfil en Chally?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThreeChally" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Tener un perfil en Chally te va a permitir contar con un portfolio profesional en el cual mostrar todos tus trabajos más destacados. 
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourChally" aria-expanded="false" aria-controls="collapseThree">
                        ¿Puedo utilizar los desafíos de Chally con fines comerciales?

                        </button>
                    </h2>
                    </div>
                    <div id="collapseFourChally" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    Chally es una comunidad que trabaja de forma orgánica, por lo cual está terminantemente prohibido utilizar los desafíos de Chally con fines comerciales. 
 
                    </div>
                    </div>
                </div>


                </div>

                <div class="fallback mt-3">
                    <p class="mb-0">¿No encontraste lo que estabas buscando?</p>
                    <a href="contacto.php">Envianos tu consulta</a>
                </div>

            </div>

        </div> <!--CIERRE ROW FAQ CHALLY -->



        <div class="row" id="cuenta">
            <div class="col-12 my-5 ">
                <h2 class="color-verde mb-3">Preguntas acerca de tu cuenta</h2>
            <div class="accordion " id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneCuenta" aria-expanded="true" aria-controls="collapseOne">
                        ¿Qué requisitos debo tener en cuenta para registrarme en Chally?
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOneCuenta" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Cualquier persona puede registrarse y empezar a participar en Chally, no es necesario que seas un experto ni nada por el estilo. ¡Lo único que se requiere son ganas de participar y aprender!

                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoCuenta" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Cómo cambio la privacidad de mi cuenta?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoCuenta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Ingresando al Panel "Mi Cuenta/Opciones de Privacidad" encontrarás la posibilidad de ocultar todos tus posteos para quienes no estén en tu lista de amigos. Por defecto, tu perfil en Chally será público.
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeCuenta" aria-expanded="false" aria-controls="collapseThree">
                        ¿Puedo ocultar algunos challenges de mi perfil?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThreeCuenta" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Claro, dentro de un challenge clickea en el Ícono del Ojo y seleccioná la opción "Ocultar". De esta manera, solo vos vas a poder ver el desafío.
                    </div>
                    </div>
                </div>



                </div>

                <div class="fallback mt-3">
                    <p class="mb-0">¿No encontraste lo que estabas buscando?</p>
                    <a href="contacto.php">Envianos tu consulta</a>
                </div>

            </div>
        </div> <!--CIERRE ROW FAQ CUENTA -->


        <div class="row" id="desafios">
            <div class="col-12 my-5 ">
                <h2 class="color-verde mb-3">Preguntas acerca de los desafíos</h2>
            <div class="accordion " id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneDesafio" aria-expanded="true" aria-controls="collapseOne">
                        ¿Cómo se elige al ganador de un desafío? 
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOneDesafio" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Existen dos modalidades para elegir un ganador: <br>
                        · Votos (la respuesta que más votos positivos tenga es la ganadora) <br>
                        · Jurado (se define un jurado compuesto por tres personas con trayectoria en la comunidad para actuar como jueces) <br>
                        Podrás ver la modalidad seleccionada en el posteo del desafío.
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoDesafio" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Qué categorías existen en Chally? 
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoDesafio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                    Momentáneamente contamos con las siguientes categorías:  <br>
                    · Arte y Diseño <br>
                    · Programación y Lógica  <br>
                    · Fotografía  <br>
                    · Storytelling  <br>
                    ¿Te gustaría que consideremos agregar una nueva categoría? Clickeá acá para contactarte con nosotros.
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeDesafio" aria-expanded="false" aria-controls="collapseThree">
                        ¿Se recibe dinero al ganar un challenge?

                        </button>
                    </h2>
                    </div>
                    <div id="collapseThreeDesafio" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    Las transacciones de dinero están prohibidas en Chally. 

                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourDesafio" aria-expanded="false" aria-controls="collapseThree">
                        ¿Hay un límite de participaciones en challenges?

                        </button>
                    </h2>
                    </div>
                    <div id="collapseFourDesafio" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    Para cuentas recientemente creadas existe un límite de tres participaciones diarias. 
 
                    </div>
                    </div>
                </div>


                </div>

                <div class="fallback mt-3">
                    <p class="mb-0">¿No encontraste lo que estabas buscando?</p>
                    <a href="contacto.php">Envianos tu consulta</a>
                </div>

            </div>
        </div> <!--CIERRE ROW FAQ DESAFIOS -->



    </section>

@endsection