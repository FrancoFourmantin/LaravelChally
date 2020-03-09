


@extends('layouts/plantilla-header')
@section('title') Desafio - {{$desafio->nombre}} @endsection
@section('clases-body' , 'animated fadeIn')

@section('main')
  
  <!--Seccion Posteos -->
  
	<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">
        <div class="col-3">

            <aside class="d-none d-md-block sticky-top">
                <a href="/feed"><p class="color-verde text-left mb-3 mx-0"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver al feed</p></a>

                <div class="card shadow  p-3 mt-1 mb-4 text-center">

                    <a href={{ "../../usuario/" . $desafio->getUsuario->username}}> <img class="rounded-circle" style="max-width:70px" src="{{asset('avatars/' . $desafio->getUsuario->avatar . '')}}" alt="Imagen de usuario"></a>
                   
                    <p class="font-weight-bold mb-0"> {{$desafio->getUsuario->nombre}}  {{$desafio->getUsuario->apellido}}</p>
                    <p class="mb-0">44 Puntos</p>
                </div>

                <div class="card shadow  p-3 mt-1 mb-4">
                    <p class="font-weight-bold mb-0">Fecha Límite de Respuesta</p>
                    <p class="mb-0">{{$desafio->fecha_limite}}</p>
                </div>

                <div class="card shadow  p-3 mt-1 mb-3 categorias">
                    <p class="font-weight-bold mb-0">Categoría</p>
                    <ul class="mb-0">
                        <li>{{$desafio->getCategoria->nombre}}</li>
                    </ul>
                </div>

                <?php $resultado =0;?>
                @foreach ($desafio->getRespuestas as $respuesta)
                    @if ($respuesta->id_autor == Auth::user()->id_usuario)
                        <?php $resultado = 1; ?>
                    @endif
                @endforeach

                @if($resultado == 1) 

                <div class="card shadow  p-3 mt-1 mb-3">
                    <p class="font-weight-bold">¡Ya respondiste este desafío!</p>
                </div>
                @else 
                <div class="card shadow  p-3 mt-1 mb-3">
                    <p class="font-weight-bold">¿Tenés tu solución lista?</p>
                    <a href="{{$desafio->id}}/respuesta/crear" class="btn btn-secondary">Editá tu respuesta</a>
                </div>

                @endif








            </aside>
        </div>

        <div class="col-12 col-md-9">

            <div class="seccion-derecha my-3">
                <!--Menu para elegir vista de posteos-->
                <!--Fin menu para elegir vista de posteos-->

                <div class="row">
                    <div class="col-12">

                        <div class="card mb-5">

                            <div class="card-contenido">
                                <div class="row">


                                    <div class="row card-content-attached">
                                        <div class="col-12">
                                            <img src="{{asset('desafios/' . $desafio->imagen)}}" class="img-fluid mb-3" alt="Imagen de desafío">
                                        </div>

                                        <div class="col-12">
                                            <h2 class="ml-0 color-verde mb-3">{{$desafio->nombre}}</h3>

                                            <div class="metadata d-flex">
                                                <span class="dificultad">Dificultad: Nivel {{$desafio->dificultad}} </span>&nbsp;&nbsp;&nbsp;
                                                <span class="participantes">Participantes: {{$desafio->getRespuestas->count()}}</span>
                                            </div>
                                            <hr>

                                            <h5>Descripción</h5>
                                        <p><?php echo nl2br($desafio->descripcion) ?></p>

                                            <hr>

                                            <h5>Requisitos y Condiciones</h5>
                                            <ul class="requisitos">
                                                <!--<li><i class="fas fa-check color-verde"></i></i> &nbsp;La landing page no necesariamente debe estar programada</li>-->
                                                <p><?php echo nl2br($desafio->requisitos) ?></p>
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



                        <hr>

																								
                    </div>
                </div>


                @if ($desafio->getRespuestas->count() == 0) 
                <h3>¡No hay respuestas! Sé el primero en completar el desafío</h3>
                @else
                <h3>Respuestas al desafío</h3>
                @endif


                
                @foreach ($desafio->getRespuestas as $respuesta)
                        
                    <div class="row mb-5">
                        <div class="col-12">

                            <div class="card">

                                <div class="card-contenido">
                                    <div class="row">


                                        <div class="row card-content-attached">

                                            <div class="col-3 text-center d-flex flex-column respuesta-datausuario ">

                                                    <a href={{ "../../usuario/" . $respuesta->getUsuario->username}}> <img class="rounded-circle mb-2" style="max-width:70px" src="{{asset('avatars/' . $respuesta->getUsuario->avatar . '')}}" alt="Imagen de usuario"></a>
                                                
                                                    <p class="font-weight-bold mb-0"> {{$respuesta->getUsuario->nombre}}  {{$respuesta->getUsuario->apellido}}</p>
                                                    <p class="mb-0">44 Puntos</p>
                                                    <br>
                                                    <small>Enviado el {{$respuesta->created_at}}</small>

                                                    <br>
                                                    @if ($respuesta->updated_at != NULL)
                                                    <small>Última actualización: {{$respuesta->updated_at}}</small>
                                                    @endif


                                                    @if ($respuesta->id_autor == Auth::user()->id_usuario)
                                                    <small><a href="/respuesta/editar/{{$respuesta->id}}"> <i class="fas fa-pencil-alt"></i>&nbsp;Editar Respuesta</a> </small>
                                                    <small><a class="text-danger" type="button" data-toggle="modal" data-target="#borrar-{{$respuesta->id}}" href="/respuesta/borrar/{{$respuesta->id}}"> <i class="fas fa-trash"></i>&nbsp;Borrar respuesta</a> </small>

                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="borrar-{{$respuesta->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Borrar desafío</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                            ¿Estás seguro de borrar tu solución? <br><br> La misma será eliminada permanentemente de tu perfil y del desafío. Esta acción no se puede deshacer.
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar borrado</button>
                                                            <form action="/respuesta/borrar/{{$respuesta->id}}">
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> &nbsp;Eliminar</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>


                                                    @endif


                                            </div>


                                            <div class="col-9">

                                                <h5>Mi solución</h5>
                                            <p><?php echo nl2br($respuesta->descripcion) ?></p>
                                           
                                            <img src="{{asset('respuestas/' . $respuesta->archivo)}}" class="img-fluid mb-3" alt="Imagen de respuesta">



                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

</div>
  
  
  <!--Fin seccion Posteos-->
@endsection