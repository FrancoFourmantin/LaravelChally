<!--<?php/*

require_once("funciones.php");

session_start();
//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}
//SI LA SESIÓN NO ESTÁ INICIADA NO SE PUEDE ACCEDER AL FEED
if(!isset($_SESSION["email"])) {
    header("location:index.php");
}
*/
?>-->
@extends('layouts/plantilla-header')
@section('title' , 'Post')
@section('clases-body' , 'animated fadeIn')

@section('main')
  
  <!--Seccion Posteos -->
  
	<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">
        <div class="col-3">

            <aside class="d-none d-md-block sticky-top">

                <div class="card shadow  p-3 mt-1 mb-4 text-center">
                    <p class="font-weight-bold mb-0"> Matías Bruno</p>
                    <p>44 Puntos</p>

                    <img class="rounded-circle d-block m-auto shadow" style="max-width:50%" src="img/foto-matias-bruno.jpg" alt="">
                    <br>
                    <a href="#" class="btn btn-secondary">Ver perfil</a>
                </div>

                <div class="card shadow  p-3 mt-1 mb-4">
                    <p class="font-weight-bold mb-0">Fecha Límite de Respuesta</p>
                    <p class="mb-0">24/04/20</p>
                </div>

                <div class="card shadow  p-3 mt-1 mb-3 categorias">
                    <p class="font-weight-bold mb-0">Categorías</p>
                    <ul class="mb-0">
                        <li>Diseño y Arte</li>
                    </ul>
                </div>

                <div class="card shadow  p-3 mt-1 mb-3">
                    <p class="font-weight-bold">¿Tenés tu solución lista?</p>
                    <a href="#" class="btn btn-secondary">Publicar respuesta</a>
                </div>





            </aside>
        </div>

        <div class="col-12 col-md-9">

            <div class="seccion-derecha my-3">
                <!--Menu para elegir vista de posteos-->
                <!--Fin menu para elegir vista de posteos-->

                <div class="row">
                    <div class="col-12">

                        <div class="card mb-5">

                            <div class="card-header posteo d-flex align-items-center">
                                <img class="rounded-circle" src="img/foto-matias-bruno.jpg" alt="Foto de Usuario">
                                <p class="mb-0 ml-3">Matías Bruno <span class="text-secondary texto-chico">(hace 2 horas)</span></p>    
                                

                                <div class="ml-auto">
                                    <a class="" href="edit-post.php"><i class="fas fa-pen"></i></a>
                                    &nbsp;

                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button>
                                </div>

                            </div>

                            <div class="card-contenido">
                                <div class="row">


                                    <div class="row card-content-attached">
                                        <div class="col-12">
                                            <img src="img/challys/viajes-especiales-landscape.jpg" class="img-fluid mb-3" alt="Desafío Viajes Espaciales">
                                        </div>

                                        <div class="col-12">
                                            <h2 class="ml-0 color-verde mb-3">Diseñá una landing page para una agencia ficticia de viajes interplanetarios</h3>

                                            <div class="metadata d-flex">
                                                <span class="dificultad">Dificultad: <img src="img/logo_c.svg" alt=""> <img src="img/logo_c.svg" alt=""> <img src="img/logo_c.svg" alt=""> <img src="img/logo_c_gris.svg" alt=""> <img src="img/logo_c_gris.svg" alt=""> </span>
                                                <span class="participantes"><i class="fas fa-user"></i>&nbsp; 18 Participantes</span>
                                            </div>
                                            <hr>

                                            <h5>Descripción</h5>
                                            <p>El desafío consiste en Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos amet qui officia repellat inventore natus molestiae, ullam odio aut similique! Accusantium obcaecati, asperiores culpa officiis aliquam esse impedit sit distinctio.</p>

                                            <hr>

                                            <h5>Requisitos y Condiciones</h5>
                                            <ul class="requisitos">
                                                <li><i class="fas fa-check color-verde"></i></i> &nbsp;La landing page no necesariamente debe estar programada</li>
                                                <li><i class="fas fa-check color-verde"></i></i> &nbsp;El diseño pueden realizarse con cualquier software de diseño</li>
                                                <li><i class="fas fa-check color-verde"></i></i> &nbsp;El diseños debe subirse en formato JPG/PNG</li>
                                                <li><i class="fas fa-check color-verde"></i></i> &nbsp;Todos los materiales gráficos pueden diseñarse desde cero o bien ser tomados de bancos públicos.</li>
                                                <li><i class="fas fa-check color-verde"></i></i> &nbsp;La landing page deberá contar si o si con una call to action de tipo formulario</li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-around">
                                <span class="likes"><i class="fas fa-heart"></i>&nbsp;18</span>

                                <span class="comments"><i class="fas fa-comment"></i>&nbsp;13</span>

                                <span class="compartidos"><i class="fas fa-share"></i>&nbsp;26</span>
                                <span class="guardar"><i class="fas fa-bookmark"></i> </span>
                            </div>





                        </div> <!-- CIERRE CARD -->




																								
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
  
  
  <!--Fin seccion Posteos-->
@endsection