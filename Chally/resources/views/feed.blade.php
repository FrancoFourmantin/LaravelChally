@extends('layouts/plantilla-header')
@section('title' , 'Feed - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')



<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">

        @if (session()->has('mensaje'))
        <div class="col-12 text-center bg-success text-white rounded py-3 mb-2">
            {{session()->get('mensaje')}}
        </div>
        @endif

        <div class="col-3">

            <aside class="d-none d-md-block sticky-top">

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-bell"></i>&nbsp;Alertas de Desafíos
                </p>
                <div class="card shadow  p-3 mt-1 mb-4 alert alert-danger">
                    <p><a href="#"><i class="fas fa-clock"></i> Creá una infografía sobre cascos de realidad virtual</a>
                        <br> ¡Termina en 6 horas!</p>

                    <p><a href="#"><i class="fas fa-clock"></i>Rediseñá la tapa de un juego actual con estilo Retro </a>
                        <br> ¡Termina en 9 horas!</p>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-user-friends"></i>&nbsp;Invitaciones
                </p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Tenés 6 invitaciones de amigos pendientes</p>
                    <a href="#" class="btn btn-secondary">Ver invitaciones</a>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3 "><i class="fas fa-list"></i>&nbsp;Filtrar por
                    categoría</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <ul class="categorias-feed mb-0">
                        @foreach ($categorias as $categoria)
                        <li>
                            <a href="/feed/categoria-{{$categoria->id}}">{{$categoria->nombre}}</a>
                            <br>
                        </li>
                        @endforeach
                    </ul>

                </div>



                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-trophy"></i>&nbsp;Chally destacado de
                    la semana</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Creá un pixel-art de un momento épico de la TV Argentina</p>
                    <img src="img/challys/pelea-samid-viale.jpg"
                        alt="Desafío - Creá un pixel-art de un momento épico de la TV Argentina">
                    <a href="#" class="btn btn-secondary">Participar</a>
                </div>

            </aside>
        </div>

        <div class="col-12 col-md-9">

            <div class="seccion-derecha my-3">
                <!--Menu para elegir vista de posteos-->
                <!--Fin menu para elegir vista de posteos-->

                @if( Request::is('feed/categoria*') )
                <h3 class="color-verde ml-0">Últimos desafíos de la categoría {{$categoriaActual->nombre}}</h3>
                <p>Encontramos {{$desafios->count()}}
                    @if ($desafios->count() == 1)
                    desafío disponible
                    @else
                    desafíos disponibles
                    @endif en esta categoría </p>
                <br>
                @endif


                @foreach ($desafios as $desafio)

                <div class="row">
                    <div class="col-12">


                        <div class="card mb-5">

                            <div class="card-header posteo d-flex align-items-center">
                                <a href={{ "../usuario/" . $desafio->getUsuario->username}}> <img class="rounded-circle"
                                        src="{{asset('avatars/' . $desafio->getUsuario->avatar . '')}}"
                                        alt="Imagen de usuario">
                                    <p class="mb-0 ml-3">{{$desafio->getUsuario->username}}
                                </a>
                                <span class="text-secondary texto-chico">Comenzó el {{$desafio->fecha_creacion}} / <span
                                        class="text-danger">Finaliza el {{$desafio->fecha_limite}}</span></span>
                                </p>


                                <div class="ml-auto">
                                    <div class="ml-auto">
                                        @if ($desafio->id_autor == Auth::user()->id_usuario)
                                        <a class="" href="/desafio/editar/{{$desafio->id}}"><i
                                                class="fas fa-pen"></i></a>
                                        &nbsp;

                                        <a type="button" data-toggle="modal" data-target="#borrar-{{$desafio->id}}"><i
                                                class="fas fa-trash-alt"></i></a>


                                        <!-- Modal -->
                                        <div class="modal fade" id="borrar-{{$desafio->id}}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Borrar desafío
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estás seguro de borrar el desafío <b>{{$desafio->nombre}}</b>?
                                                        <br><br> Todos los datos y respuestas al desafío serán
                                                        eliminados permanentemente. Esta acción no se puede deshacer.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar borrado</button>
                                                        <form action="desafio/borrar/{{$desafio->id}}">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash-alt"></i>
                                                                &nbsp;Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        @endif
                                    </div>
                                </div>
                                <?//php endif; ?>

                            </div>

                            <div class="card-contenido">
                                <div class="row">


                                    <div class="row card-content-attached">
                                        <div class="col-12 col-md-4">
                                            <img src="{{asset('desafios/' . $desafio->imagen .'')}}" class="img-fluid"
                                                alt="Imagen de Desafío">
                                        </div>

                                        <div class="col-12 col-md-8">
                                            <h3 class="ml-0">{{$desafio->nombre}}</h3>

                                            <div class="metadata d-flex ">
                                                <span class="dificultad"> <b>Dificultad</b>: Nivel
                                                    {{$desafio->dificultad}} &nbsp;&nbsp;&nbsp;
                                                    <span class="participantes">&nbsp;<b>Participantes</b>:
                                                        {{$desafio->getRespuestas->count()}}</span>

                                            </div>
                                            <br>
                                            <p> <?php echo nl2br(substr($desafio->descripcion,0,255),false) . "..." ; ?>
                                            </p>

                                            <a href="/desafio/ver/{{$desafio->id}}" class="btn btn-secondary">Ver
                                                más</a>
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
                        <?//php }?>




                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </div>

</div>

</div>

</div>
<!--Seccion Posteos -->



@endsection