@extends('layouts/plantilla-header')
@section('title' , 'Perfil')
@section('clases-body' , 'perfil animated fadeIn')

@section('main')


<!--Seccion PORTADA -->

<header class="profile">
  <div class="container-fluid">
    <!--<div class="row">-->
      <!--<div class="col-12">-->
        <div class="text-white info_profile text-center pt-5 pb-5" style="background-image: url('../covers/{{$usuario->cover}}');
        ">
          <!-- <img class="img-thumbnail rounded-circle profile-pic" src="avatars/<?//=$usuario['avatar'];?>" alt="head_profile">         -->

          

              
              
              <!-- Modal -->
              <div class="modal fade text-body" id="agregar-{{$usuario->username}}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Agregar amigo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Vas a agregar a <strong>{{$usuario->username}}</strong> como amigo, continuar?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-trash"></i>
                        &nbsp;Cancelar</button>
                        <form action="/usuario/agregar/{{$usuario->username}}">
                          <button type="submit" class="btn btn-secondary">Agregar amigo</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Fin del modal --}}
                
                
                <!-- Modal cancelar peticion de amistad -->
                <div class="modal fade text-body" id="cancelar-{{$usuario->username}}" tabindex="-1" role="dialog"
                  aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancelar solicitud</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Eliminar solicitud de amistad para <strong>{{$usuario->username}}</strong> ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-trash"></i>
                          &nbsp;Cancelar</button>
                          <form action="/usuario/cancelar/{{$usuario->username}}">
                            <button type="submit" class="btn btn-secondary">Emiliminar solicitud</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- Fin del modal --}}
                  
                  
                </div>
              </div>
            </header>
            
            <!--Fin Seccion PORTADA -->
            
            
            <!--Seccion Posteos -->
            
            <div class="container-fluid">
              <div class="row">
                <div class="col-2 ml-5 d-none d-mb-flex d-lg-flex aside-perfil">
                  
                  <aside>
                    
                    <section class="informacion_usuario position-relative shadow px-4 mt-3 mb-3 pb-5 rounded">

                      <div class="d-flex flex-column align-items-center">
                      <img class="main-foto img-fluid mb-3 shadow position-absolute" src="{{ asset("avatars/$usuario->avatar")}}" alt="foto_usuario">
                      <h2>{{ $usuario->nombre }} {{$usuario->apellido}}</h2>
                      <p class="text-secondary">{{ $usuario->username}}</p>
                      
                      @if(Auth::user()->username == $usuario->username)
                        <a href="/editar-perfil"><i class="fas fa-pen"></i>&nbsp; Editar perfil</a>
                      @endif

                      {{-- Modal para agregar amigo --}}
                      @if($amistad  == 'not amigos')
                      <a class="btn bg-verde white" type="button" data-toggle="modal" data-target="#agregar-{{$usuario->username}}"><i class="fas fa-plus"></i> Agregar
                        amigo</a>
                        @elseif($amistad  == 'enviada')
                        <a class="btn bg-verde" type="button" data-toggle="modal" data-target="#cancelar-{{$usuario->username}}">Solicitud
                          enviada!</a>
                          @elseif($amistad  == "amigos")
                          <div class="text-white bg-verde d-inline-block p-2 rounded">
                            Son amigos!
                          </div>
                          @elseif($amistad  == "persona")
                          
                          @endif

                      </div>
                          <hr class="w-100">

                          <div class="d-flex flex-row justify-content-between">
                           <p class="mb-0 text-secondary">Desafíos creados</p>
                           <p>{{$countDesafios}}</p>
                          </div>

                          <div class="d-flex flex-row justify-content-between">
                            <p class="mb-0 text-secondary">Respuestas creadas</p>
                            <p class="mb-0">{{$countRespuestas}}</p>
                           </div>

                          <hr class="w-100">

                      @if($usuario->bio) 
                      <span class="font-weight-bold">Bio</span><br>
                      <p class="text-secondary">{{$usuario->bio}}</p>

                        <hr>
                      @endif



                        @if ($usuario->link_website || $usuario->link_behance || $usuario->link_linkedin || $usuario->link_github)
                        <span class="font-weight-bold">Encontrame en</span><br><br>

                        <div class="d-flex flex-row justify-content-around redes">

                          @if ($usuario->link_linkedin)
                          <a href="{{$usuario->link_linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                          @endif

                          @if ($usuario->link_behance)
                          <a href="{{$usuario->link_behance}}" target="_blank"><i class="fab fa-behance"></i></a>
                          @endif

                          @if ($usuario->link_github)
                          <a href="{{$usuario->link_github}}" target="_blank"><i class="fab fa-github"></i></a>
                          @endif

                          @if ($usuario->link_website)
                          <a href="{{$usuario->link_website}}" target="_blank"><i class="fas fa-globe-americas"></i></i></a>
                          @endif
                        </div>

                        @endif

                      </section>
                      
                                  
                                  
                                </aside>
                              </div>
                              
                              <div class="col-12 mt-3 d-mb-none d-lg-none d-xl-none">
                                <p>
                                  <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                  aria-controls="collapseExample">
                                  Info usuario
                                </a>
                              </p>
                              <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                  <aside>
                                    <section class="informacion_usuario   p-3 mt-3 mb-3">
                                      <h3 class="color-verde">Acerca del usuario</h3>
                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quis excepturi, cum veritatis delectus
                                        inventore, deserunt aliquam ea repellat quam reprehenderit, saepe possimus dignissimos fuga animi
                                        recusandae. Esse, earum ullam!</p>
                                        <div class="trofeos">
                                          <div>
                                            <!--Tarjeta para trofeos ganados -->
                                            <div class="container-fluid mb-3">
                                              <div class="row no-gutters">
                                                <div class="col-md-4 col-4">
                                                  <img src="img/trofeo_perfil.png" class="card-img p-3" alt="...">
                                                </div>
                                                <div class="col-md-8 col-8">
                                                  <div class="card-body">
                                                    <h5 class="card-title">Chally destacado</h5>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                      </section>
                                      
                                      <section class="p-3 mt-3 mb-3">
                                        <h4 class="color-verde text-center">Lista de amigos</h4>
                                        <div class="container-fluid">
                                          <div class="row">
                                            <div class="col-6 col-sm-6">
                                              <div class=" text-center  p-1 m-1">
                                                <a href="#" class="text-decoration-none "><img class=" rounded-circle"
                                                  src="http://lorempixel.com/100/100/people" alt="meme"></a>
                                                  
                                                </div>
                                              </div>
                                              

                                                      
                                                    </div>
                                                  </section>
                                                  
                                                  
                                                </aside>
                                              </div>
                                            </div>
                                            
                                          </div>
                                          
                                          
                                          <div class="col-12 col-mb-8 col-lg-8 offset-md-2 pl-5 mt-3">

                                            <div class="row">
                                              <div class="col-12">
                                                <ul class="nav nav-tabs secciones_perfil d-flex flex-row mb-3" role="tablist">
                                                    <li class="nav-item">
                                                      <a class="nav-link active" id="respuestas-tab" data-toggle="tab" href="#respuestas" aria-selected="true">Respuestas ({{$countRespuestas}})</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <a class="nav-link" id="desafios-tab" data-toggle="tab" href="#desafios" aria-selected="false">Desafíos Creados ({{$countDesafios}})</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <a class="nav-link" id="actividad-tab" data-toggle="tab" href="#actividad" aria-selected="false">Actividad Reciente</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <a class="nav-link" id="amigos-tab" data-toggle="tab" href="#amigos" aria-selected="false">Amigos</a>
                                                    </li>
                                                </ul>
                                              </div>
                                            </div>


                                            <div class="tab-content" id="myTabContent">


                                              <div class="tab-pane fade show active" id="respuestas" role="tabpanel" aria-labelledby="respuestas-tab">

                                                @if(!count($respuestas))
                                                <div class="alert alert-success" role="alert">
                                                  ¡Este usuario todavia no tiene respuestas!
                                                </div>


                                                @else
                                                <div class="row">
                                                  <div class="col-12">
                                                    <div class="card-columns">

                                                  @foreach($respuestas as $respuesta)
                                                    
                                                  <a href="/desafio/ver/{{$respuesta->getDesafio->id}}">
                                                    <div class="card respuesta">
                                                      <img class="card-img-top" src="{{asset("respuestas/$respuesta->archivo")}}" alt="Card image cap">
                                                      <div class="card-body">
                                                        <h5 class="card-title">{{$respuesta->getDesafio->nombre}}</h5>
                                                        <p class="card-text">{{$respuesta->descripcion}}</p>
                                                        <p class="card-text"><small class="text-muted">{{$respuesta->updated_at}}</small></p>
                                                      </div>
                                                    </div>
                                                  </a>

                                                  @endforeach
                                                </div>

                                              </div>
                                              </div>

                                                @endif


                                              </div>

                

                                              <div class="tab-pane fade" id="desafios" role="tabpanel" aria-labelledby="desafios-tab">

                                                @if(!count($desafios))
                                                <div class="alert alert-success" role="alert">
                                                  Este usuario todavia no tiene desafios!
                                                </div>


                                                @else
                                                <div class="row">
                                                  <div class="col-12">
                                                @foreach($desafios as $desafio)

                                                    
                                                    
                                                    <div class="card mb-5">
                                                      
                                                      <div class="card-header posteo d-flex align-items-center">
                                                        <a href={{ "../usuario/" . $desafio->getUsuario->username}}> <img class="rounded-circle"
                                                          src="{{asset('avatars/' . $desafio->getUsuario->avatar . '')}}" alt="Imagen de usuario">
                                                          <p class="mb-0 ml-3">{{$desafio->getUsuario->username}}
                                                          </a>
                                                          <span class="text-secondary texto-chico">Comenzó el {{$desafio->fecha_creacion}} / <span
                                                            class="text-danger">Finaliza el {{$desafio->fecha_limite}}</span></span>
                                                          </p>
                                                          
                                                          
                                                          <div class="ml-auto">
                                                            <div class="ml-auto">
                                                              @if ($desafio->id_autor == Auth::user()->id_usuario)
                                                              <a class="" href="/desafio/editar/{{$desafio->id}}"><i class="fas fa-pen"></i></a>
                                                              &nbsp;
                                                              
                                                              <a type="button" data-toggle="modal" data-target="#borrar-{{$desafio->id}}"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                                
                                                                
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="borrar-{{$desafio->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Borrar desafío</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                        ¿Estás seguro de borrar el desafío <b>{{$desafio->nombre}}</b>? <br><br> Todos los datos y
                                                                        respuestas al desafío serán eliminados permanentemente. Esta acción no se puede deshacer.
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar borrado</button>
                                                                        <form action="desafio/borrar/{{$desafio->id}}">
                                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                                            &nbsp;Eliminar</button>
                                                                          </form>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  
                                                                  
                                                                  
                                                                  @endif
                                                                </div>
                                                              </div>
                                                              
                                                            </div>
                                                            
                                                            <div class="card-contenido">
                                                              <div class="row">
                                                                
                                                                
                                                                <div class="row card-content-attached">
                                                                  <div class="col-12 col-md-4">
                                                                    <img src="{{asset('desafios/' . $desafio->imagen .'')}}" class="img-fluid" alt="Imagen de Desafío">
                                                                  </div>
                                                                  
                                                                  <div class="col-12 col-md-8">
                                                                    <h3 class="ml-0">{{$desafio->nombre}}</h3>
                                                                    
                                                                    <div class="metadata d-flex ">
                                                                      <span class="dificultad"> <b>Dificultad</b>: Nivel {{$desafio->dificultad}} &nbsp;&nbsp;&nbsp;
                                                                        <span class="participantes">&nbsp;<b>Participantes</b>:
                                                                          {{$desafio->getRespuestas->count()}}</span>
                                                                          
                                                                        </div>
                                                                        <br>
                                                                        <p> <?php echo nl2br(substr($desafio->descripcion,0,255),false) . "..." ; ?> </p>
                                                                        
                                                                        <a href="/desafio/ver/{{$desafio->id}}" class="btn btn-secondary">Ver más</a>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                  </div>
                                                                  
                                                                </div>
                                                                
                                                              </div>
                                                              
                                                              @endforeach
                                                  </div>
                                                </div>
                                                              @endif

                                              </div>


                                              <div class="tab-pane fade" id="actividad" role="tabpanel" aria-labelledby="actividad-tab">EN DESARROLLO.</div>
                                              <div class="tab-pane fade" id="amigos" role="tabpanel" aria-labelledby="amigos-tab">

                                              <div class="row">
                                                
                                                @forelse($amigos as $amigo)       
                                                <div class="col-sm-4 p-3">
                                                  <div class="text-center  p-1 m-1">
                                                    <p><a href="/usuario/{{$amigo->username}}" class="text-decoration-none "><img class=" rounded-circle"
                                                    src="{{asset("avatars/$amigo->avatar")}}" alt="meme" max-width="50px" height="50px"></a></p>
                                                      <p><a href="/usuario/{{$amigo->username}}" class="text-decoration-none">
                                                        {{$amigo->username}}
                                                      </a><p>
                                                    </div>
                                                  </div>
                                                @empty
                                                <div class="alert alert-success" role="alert">
                                                  Este usuario todavia no tiene amigos!
                                                </div>
                                                @endforelse
                                              </div>


                                              </div>
                                            </div>



                                                          
                                                          <div class="col-2 d-none d-mb-flex d-lg-flex d-xl-flex d-sm-none col-sm-2 col-md-1 col-lg-1 col-xl-1">
                                                            <div class="text-center">
                                                              <div class="dropdown d-flex mt-3">

                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                
                                              </div>
                                              
                                            </div>
                                            
                                          </div>
                                          
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                    
                                  </div>
                                  
                                </div>
                                
                              </div>
                              
                              
                              <!--Fin seccion Posteos-->
                              @endsection