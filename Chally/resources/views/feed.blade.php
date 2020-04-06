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
                
                
                @if(Auth::user()->getBookmarks->isNotEmpty() )  
                
                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-bookmark"></i>&nbsp;Desafíos guardados
                </p>
                
                
                
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
                    <hr>
                    
                    @endif
                    
                    
                    
                    <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-user-friends"></i>&nbsp;Invitaciones
                    </p>
                    <div class="px-3 mt-1 mb-4">
                        
                        @if (Auth::user()->getSolicitudesDeAmistad())
                        <p>Tenés {{Auth::user()->getSolicitudesDeAmistad()}} invitaciones de amigos pendientes</p>
                        <a href="/usuario/{{Auth::user()->username}}/solicitudes" class="btn btn-secondary">Ver invitaciones</a>
                        
                        @else 
                        <p>No tenés solicitudes de amistad pendientes</p>
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
                                                                        <input type="hidden"  name="usuario" value="{{Auth::user()->id_usuario}}">
                                                                        <button id="like-action" name="like" value="like" type="submit"><span class="guardar"><span class="likes"><i class="fas fa-heart"></i><span class="porcentaje"></span></span></button>
                                                                        <button id="like-action" name="like" value="dislike" type="submit"><span class="guardar"><span class="dislikes"><i class="fas fa-thumbs-down"></i></span></button>
                                                                    </form>     
                                                                    
                                                                    
                                                                    
                                                                    <span class="comments"><i class="fas fa-comment"></i>&nbsp;{{$desafio->getRespuestas->count()}}</span>
                                                                    
                                                                    <?php $tiene = "";?>
                                                                    @foreach (Auth::user()->getBookmarks as $bookmark)
                                                                    @if($bookmark->id_desafio == $desafio->id)
                                                                    <?php $tiene = $bookmark->id;?>
                                                                    @endif
                                                                    @endforeach
                                                                    
                                                                    @if($tiene)
                                                                    
                                                                    <form action="/bookmarks/eliminar/{{$bookmark->id}}" method="GET">
                                                                        @csrf
                                                                        <button id="bookmark-action" type="submit btn">
                                                                            <span class="borrar"><i class="color-verde fas fa-bookmark"></i>&nbsp; Eliminar de favoritos </span></button>
                                                                        </form>
                                                                        
                                                                        @else
                                                                        
                                                                        <form action="/bookmarks/agregar" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="desafio" value="{{$desafio->id}}">
                                                                            <input type="hidden"  name="usuario" value="{{Auth::user()->id_usuario}}">
                                                                            <button id="bookmark-action" type="submit btn"><span class="guardar"><i class="fas fa-bookmark"></i>&nbsp; Guardar en favoritos </span></button>
                                                                        </form>                                    
                                                                        
                                                                        @endif
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
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
                                
                                
                                <script>
                                    let likeForm = document.querySelectorAll("#form_like");
                                    
                                    
                                    //Primero invocamos todos los formularios de likes
                                    window.addEventListener('load' , function(e){
                                        likeForm.forEach(function(form){
                                            
                                            let id_usuario = form.querySelector("input[name=usuario]").value;
                                            let id_desafio = form.querySelector("input[name=desafio]").value;
                                            let spanPorcentaje = form.querySelector(".porcentaje");
                                            
                                            fetch(`/likes/get/${id_desafio}`)
                                            .then(function(response){
                                                return response.json();
                                            })
                                            .then(function(likes){
                                                console.log(likes);
                                                likes.stringify;                                                
                                                let spanLike = form.querySelector(".likes");                                                
                                                //Si el usuario ya le dio like a ese desafio lo ponemos rojito
                                                if(likes.authUserLike == true){
                                                    spanLike.style.color = "#dd0000";                                            
                                                }
                                                
                                                let spanDislike = form.querySelector(".dislikes");  
                                                if(likes.authUserDislike == true){
                                                    spanDislike.style.color = "#dd0000";
                                                }
                                                
                                            
                                                    spanPorcentaje.innerHTML = likes.porcentajeDeLikes + '%';                                                
                                            
                                            })
                                            .catch(function(error){
                                                console.log(error);
                                            })
                                        })
                                        
                                    })
                                    
                                    
                                    //A cada boton de like le ponemos un eventListener para saber que boton esta clickeando
                                    let submitButtons = document.querySelectorAll("button[name=like]");
                                    let accion = "";
                                    submitButtons.forEach(button => button.addEventListener("click" , function(e){
                                        accion = this.value;                                            
                                    }))
                                    
                                    //A cada uno de los likeForm le metemos un eventListener
                                    likeForm.forEach(form => form.addEventListener("submit" , function(e){
                                        e.preventDefault();
                                        
                                        //Seleccionamos el form que fue clickeado el particular
                                        let form = e.currentTarget;                                                                 
                                        
                                        //Coleccionamos los datos que vamos a mandar via FETCH                                                                               
                                        
                                        let id_usuario = form.querySelector("input[name=usuario]").value;
                                        let id_desafio = form.querySelector("input[name=desafio]").value;
                                        let token = form.querySelector('meta[name=csrf-token]').getAttribute('content');
                                        
                                        fetch('/likes/new',{
                                            headers: {
                                                "Content-Type": "application/json",
                                                "Accept": "application/json, text-plain, */*",
                                                "X-Requested-With": "XMLHttpRequest",
                                                "X-CSRF-TOKEN": token
                                            },
                                            method: 'post',
                                            body: JSON.stringify({
                                                id_usuario: id_usuario,
                                                id_desafio: id_desafio,
                                                accion: accion                                                
                                            })
                                        })
                                        .then(function(response){
                                            return response.text();
                                        })
                                        .then(function(data){
                                           
                                            //Vamos a remover las propiedades
                                            
                                            let spanLike = form.querySelector(".likes"); 
                                            let spanDislike = form.querySelector(".dislikes"); 
                                            spanLike.style.color = "#000000";
                                            spanDislike.style.color = "#000000";
                                            let spanPorcentaje = form.querySelector(".porcentaje");
                                            
                                            //Aqui tiramos otro fetch para no recargar la pagina y mostrar los resultados
                                            fetch(`/likes/get/${id_desafio}`)
                                            .then(function(response){
                                                return response.json();
                                            })
                                            .then(function(likes){
                                                
                                                likes.stringify;                                            
                                                
                                                //Si el usuario ya le dio like a ese desafio lo ponemos rojito
                                                if(likes.authUserLike == true){
                                                    spanLike.style.color = "#dd0000";                                            
                                                }
                                                
                                                let spanDislike = form.querySelector(".dislikes");  
                                                if(likes.authUserDislike == true){
                                                    spanDislike.style.color = "#dd0000";
                                                }
                                                
                                               
                             
                                                    spanPorcentaje.innerHTML = likes.porcentajeDeLikes + "%";                                                
                                                
                                            })
                                            .catch(function(error){
                                                console.log(error);
                                            })
                                            
                                        })
                                        .catch(function(error){
                                            console.log(error);
                                        });
                                        
                                    })) //Fin eventListener
                                    
                                    
                                    
                                </script>
                                
                                
                                @endsection