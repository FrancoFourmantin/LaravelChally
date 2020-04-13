@extends('layouts/plantilla-header')
@section('title' , 'Feed - Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')
<?php
use Carbon\Carbon;
use App\Categoria;

?>



<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">
        
        @if (session()->has('mensaje'))
        <div class="col-12 text-center bg-success text-white rounded py-3 mb-2">
            {{session()->get('mensaje')}}
        </div>
        @endif
        
        <div class="col-3">
            
            <aside class="d-none d-md-block sticky-top">
                
                @if (Auth::check())
                @if( Auth::user()->getBookmarks->isNotEmpty() )  
                
                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-bookmark"></i>&nbsp;Tus recordatorios
                </p>
                
                <div class="card  p-3 mt-1 mb-4 alert alert-danger bookmarkList">

                </div>
                {{-- 
                <div class="card  p-3 mt-1 mb-4 alert alert-danger">
                    @foreach(Auth::user()->getBookmarks as $bookmark)
                    <p><a href="/desafio/ver/{{$bookmark->getDesafio->id}}">{{$bookmark->getDesafio->nombre}} </a><br>
                        
                        @if(Carbon::now() < $bookmark->getDesafio->fecha_limite)
                        <i class="fas fa-clock"></i>&nbsp;Finaliza el {{$bookmark->getDesafio->fecha_limite}}</p>
                        @else 
                        <i class="fas fa-times"></i>&nbsp;El desafío expiró</p>
                        @endif
                        
                        
                        @endforeach
                </div>

                --}}

                <hr>

                    @endif
                    @endif
                    
                    
                    <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-user-friends"></i>&nbsp;Invitaciones
                    </p>
                    <div class="px-3 mt-1 mb-4">
                        @if(Auth::check())
                        @if (Auth::user()->getSolicitudesDeAmistad())
                        <p>Tenés {{Auth::user()->getSolicitudesDeAmistad()}} invitaciones de amigos pendientes</p>
                        <a href="/usuario/{{Auth::user()->username}}/solicitudes" class="btn btn-secondary">Ver invitaciones</a>
                        
                        @else 
                        <p>No tenés solicitudes de amistad pendientes</p>
                        @endif
                        @endif
                    </div>
                    
                    
                    <hr>
                    
                    <p class="color-verde font-weight-bold mb-1 ml-3 "><i class="fas fa-list"></i>&nbsp;Filtrar por
                        categoría</p>
                        <div class="px-3 mt-1 mb-4">
                            <ul class="categorias-feed mb-0">
                                @foreach ($categorias as $categoria)
                                <li>
                                    
                                    
                                    @if($categoria->parent_id == NULL)
                                    <a class="font-weight-bold" href="/feed/categoria-{{$categoria->id}}">{{$categoria->nombre}}</a>
                                    <br>
                                    
                                    <?php $pepito = Categoria::getChilds($categoria->id); 
                                    
                                    ?>
                                    
                                    @foreach($pepito as $nombre)
                                    
                                    <a class="" href="/feed/categoria-{{$nombre->id}}">{{$nombre->nombre}}</a><br>
                                    
                                    @endforeach
                                    
                                    
                                    
                                    
                                    <br>
                                    @endif
                                    
                                    
                                    
                                    
                                </li>
                                @endforeach
                            </ul>
                            
                        </div>


         
                        
                        
                    </aside>
                </div>
                
                <div class="col-12 col-md-8">
                    
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
                            
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Modal Registro</button>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content modal-register">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6 d-none d-lg-block left" >
                                                <img class="position-relative" src="img/pencil-guy.png" alt="">
                                            </div>

                                            <div class="col-12 col-lg-5 px-5 px-lg-3 py-5 d-flex flex-column justify-content-between">
                                                <div>
                                                    <img src="img/logo_c.svg" style="width:60px" alt="" class="text-center d-block m-auto pb-3">
                                                    <h4 class="color-verde mb-4 text-center">¡Registrate y armá tu portfolio creativo ahora!</h4>

                                                    <form action="register" method="GET">

                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="inputName" name="nameHero" placeholder="Tu nombre" required>
                                                        </div>
                                        
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" id="inputMail" name="mailHero" placeholder="Tu mail" required >
                                                        </div>    
                                                        
                                                        <button class="btn btn-secondary w-100" type="submit">Registrarme</button>


                                                    </form>

                                                    <ul class="mt-4">
                                                        <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Armá tu portfolio profesional</li>
                                                        <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Participá en cientos de desafíos online</li>
                                                        <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Creá tus propios desafíos</li>
                                                        <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Poné en práctica tus habilidades y hobbies</li>
                                                        <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Inspirate viendo trabajo de otras personas</li>
                                                    </ul>
                                                </div>    


                                                <div class="text-center w-100">
                                                    <hr>
                                                    <p class="color-verde light">¿Ya tenés cuenta?</p>
                                                    <a class="btn btn-outline-dark" href="/login" role="button"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>                                 

                            @foreach ($desafios as $desafio)
                            
                            <div class="row" id="desafio-{{$desafio->id}}">
                                <div class="col-12">
                                    
                                    
                                    <div class="card mb-5">
                                        
                                        <div class="card-header posteo d-flex align-items-center">
                                            <a href={{ "../usuario/" . $desafio->getUsuario->username}}> <img class="rounded-circle"
                                                src="{{asset('avatars/' . $desafio->getUsuario->avatar . '')}}"
                                                alt="Imagen de usuario">
                                            </a>
                                            
                                            <div class="d-flex flex-column ml-3">
                                                
                                                
                                                <p class="mb-0">{{$desafio->getUsuario->username}}</p>
                                                
                                                <p class="mb-0"><span class="text-secondary texto-chico">Comenzó el {{$desafio->fecha_creacion}} / <span
                                                    class="text-danger">Finaliza el {{$desafio->fecha_limite}}</span></span>
                                                </p>
                                            </div>
                                            
                                            <div class="ml-auto">
                                                <div class="ml-auto">
                                                    {{-- Si el usuario es administrador y no es el dueño del desafio puede borrarlo --}}
                                                    @if(Auth::check())
                                                    @if (Auth::user()->role == "admin" && $desafio->id_autor != Auth::user()->id_usuario )
                                                    <a type="button" data-toggle="modal" data-target="#borrar-{{$desafio->id}}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="borrar-{{$desafio->id}}" tabindex="-1" role="dialog"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Borrar desafío - Como administrador
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
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <?//php endif; ?>
                                                        
                                                    </div>
                                                    
                                                    <a href="/desafio/ver/{{$desafio->id}}">
                                                        <div class="card-contenido">
                                                            <div class="row">
                                                                
                                                                
                                                                <div class="row card-content-attached">
                                                                    <div class="col-12 imagen-feed">
                                                                        <div style="background-image:url('{{asset('desafios/' . $desafio->imagen .'')}}');"></div>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                        <h3 class="ml-0">{{$desafio->nombre}}</h3>
                                                                        
                                                                        <hr>
                                                                        
                                                                        <div class="metadata d-flex ">
                                                                            <span class="dificultad"> <b>Dificultad</b>: Nivel
                                                                                {{$desafio->dificultad}} &nbsp;&nbsp;&nbsp;
                                                                                <span class="participantes">&nbsp;<b>Participantes</b>:
                                                                                    {{$desafio->getRespuestas->count()}}</span>&nbsp;&nbsp;&nbsp;
                                                                                    <span class="categoria">&nbsp;<b>Categoría</b>:
                                                                                        {{$desafio->getCategoria->nombre}}</span>
                                                                                        
                                                                                        
                                                                                    </div>
                                                                                    <br>
                                                                                    <p> <?php echo nl2br(substr($desafio->descripcion,0,255),false) . "..." ; ?>
                                                                                    </p>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </a>
                                                                
                                                                <div class="card-footer d-flex justify-content-around">
                                                                    
                                                                    
                                                                    <form id="form_like" action="/likes/new" method="POST">
                                                                        <meta id="like-token" name="csrf-token" content="{{ csrf_token() }}">
                                                                        <input type="hidden" name="desafio" value="{{$desafio->id}}">
                                                                        @if(Auth::check())
                                                                        <input type="hidden"  name="usuario" value="{{Auth::user()->id_usuario}}">
                                                                        @endif
                                                                        <span class="porcentaje"></span>&nbsp;&nbsp;
                                                                        <button id="like-action" class="defaultButton" name="like" value="like" type="submit"><span class="guardar "><span class="likes"><i class="fas fa-thumbs-up"></i></span></button>
                                                                        &nbsp;&nbsp;
                                                                        <button id="like-action" class="defaultButton" name="like" value="dislike" type="submit"><span class="guardar defaultButton"><span class="dislikes"><i class="fas fa-thumbs-down"></i></span></button>
                                                                    </form>     
                                                                    
                                                                    
                                                                    
                                                                    <span class="comments"><i class="fas fa-comment"></i>&nbsp;{{$desafio->getRespuestas->count()}}</span>
                                                                    

                                                                    <span>
                                                                    <form action="/bookmarks/procesar/" method="POST" id="bookmark-form">
                                                                        <meta id="bookmark-token" name="csrf-tokenn" content="{{ csrf_token() }}">
                                                                        <input type="hidden" name="bookmark-action" value="">
                                                                        <input type="hidden" id="bookmark-desafio" name="bookmarkDesafio" value="{{$desafio->id}}">
                                                                        <button id="bookmark-action" class="animated fadeIn" type="submit btn">
                                                                            <i class="fas fa-bookmark"></i> <span class="animated"></span>
                                                                        </button>
                                                                    </form>
                                                                    </span>

                                                                 <!-- BOOKMARK FUNCIONAL SIN AJAX -->
                                                                   {{--
                                                                    @forelse ($desafio->getBookmarks as $bookmark)
                                                                        @if($bookmark->id_usuario == Auth::user()->id_usuario)

                                                                            <form action="/bookmarks/procesar/" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="bookmark-action" value="delete">
                                                                                <input type="hidden" name="bookmark-desafio" value="{{$desafio->id}}">
                                                                                <input type="hidden" name="bookmark-id" value="{{$bookmark->id}}">
                                                                                <button id="bookmark-action" type="submit btn">
                                                                                    <i class="fas color-verde fa-bookmark"></i> Quitar
                                                                                </button>
                                                                            </form>
                                                                        @endif

                                                                    @empty
                                                                            <form action="/bookmarks/procesar/" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="bookmark-action" value="save">
                                                                                <input type="hidden" name="bookmark-desafio" value="{{$desafio->id}}">

                                                                                <button id="bookmark-action" type="submit btn">
                                                                                    <i class="fas fa-bookmark"></i> Guardar
                                                                                </button>
                                                                            </form>
                                                                    @endforelse
                                                                    
                                                                    
                                                                    --}} 

                                                                        
                                                                                                       
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
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
                                
                                
                            <script src="{{asset('js/likes_functions.js')}}"></script>
                            <script src="{{asset('js/bookmarks_functions.js')}}"></script>

                            <script>
                            </script>
                                
                                @endsection