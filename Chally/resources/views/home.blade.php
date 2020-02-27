@extends('layouts/plantilla-header')
@section('title' , 'Feed - Chally')
@section('clases-body' , 'animated fadeIn')
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>


  
<div class="container contenedor-feed mt-3 mb-5">
    <div class="row">
        <div class="col-3">

            <aside class="d-none d-md-block sticky-top">

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-bell"></i>&nbsp;Alertas de Desafíos</p>
                <div class="card shadow  p-3 mt-1 mb-4 alert alert-danger">
                    <p><a href="#"><i class="fas fa-clock"></i> Creá una infografía sobre cascos de realidad virtual</a>
                        <br> ¡Termina en 6 horas!</p>

                    <p><a href="#"><i class="fas fa-clock"></i>Rediseñá la tapa de un juego actual con estilo Retro  </a>
                        <br> ¡Termina en 9 horas!</p>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-user-friends"></i>&nbsp;Invitaciones</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Tenés 6 invitaciones de amigos pendientes</p>
                    <a href="#" class="btn btn-secondary">Ver invitaciones</a>
                </div>

                <p class="color-verde font-weight-bold mb-1 ml-3"><i class="fas fa-trophy"></i>&nbsp;Chally destacado de la semana</p>
                <div class="card shadow  p-3 mt-1 mb-4">
                    <p>Creá un pixel-art de un momento épico de la TV Argentina</p>
                    <img src="img/challys/pelea-samid-viale.jpg" alt="Desafío - Creá un pixel-art de un momento épico de la TV Argentina">
                    <a href="#" class="btn btn-secondary">Participar</a>
                </div>

            </aside>
        </div>

        <div class="col-12 col-md-9">

            <div class="seccion-derecha my-3">
                <!--Menu para elegir vista de posteos-->
                <!--Fin menu para elegir vista de posteos-->

                {{-- <?//php foreach($desafios as $desafio){?> --}}
                <div class="row">
                    <div class="col-12">

                        
                        <div class="card mb-5">

                            <div class="card-header posteo d-flex align-items-center">
                                <img class="rounded-circle" src="avatars/<?//=$desafio['avatar']?>" alt="Foto de Usuario">
                                <p class="mb-0 ml-3"><?//=$desafio['username']?>&nbsp;<span class="text-secondary texto-chico">Comenzó el <?//=$desafio['fecha_creacion']?> / Finaliza el <?//=$desafio['fecha_limite']?></span></p>    
                                
                               <?//php if($desafio['id_usuario'] == $usuario['id_usuario'] ):?>
                                <div class="ml-auto">
                                <div class="ml-auto">
                                    <a class="" href="edit-post.php?id_desafio=<?//=$desafio['id_desafio']?>"><i class="fas fa-pen"></i></a>
                                    &nbsp;


                                   <!-- <form method="post"> 
                                        <input class="btn" type="submit" name="button1" value='<i class="far fa-trash-alt"></i>'/>
                                    </form>-->
                                    <form action="delete-post.php" style="display: inline" method="POST">
                                    <button type="submit" class="btn" data-toggle="modal" value="<?//=$desafio['id_desafio']?>" name="id_desafio"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                </div>
                               <?//php endif; ?>

                            </div>

                            <div class="card-contenido">
                                <div class="row">


                                    <div class="row card-content-attached">
                                        <div class="col-12 col-md-4">
                                            <img src="img_post/<?//=$desafio['imagen']?>" class="img-fluid" alt="Desafío Viajes Espaciales">
                                        </div>

                                        <div class="col-12 col-md-8">
                                            <h3 class="ml-0"><?//=$desafio['nombre_desafio']?></h3>

                                            <div class="metadata d-flex ">
                                                <span class="dificultad">Dificultad: <?//php for ($i = 0 ; $i < $desafio['dificultad'] ; $i++){ echo "<img src='img/logo_c.svg' alt=''>"; }?>  <?php// for ($i = $desafio['dificultad'] ; $i < 5 ; $i++){ echo "<img src='img/logo_c_gris.svg' alt=''>"; }?>  
                                                <span class="participantes"><i class="fas fa-user"></i>&nbsp; 18 Participantes</span>

                                            </div>
                                            <br>
                                            <h4>Descripcion:</h4>
                                            <p><?//=$desafio['descripcion']?></p>
                                            <h4>Requisitos</h4>
                                            <p><?//=$desafio['requisitos']?></p>
                                            <a href="#" class="btn btn-secondary">Abrir desafío</a>
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
            </div>

        </div>
    </div>

</div>

</div>

</div>  <!--Seccion Posteos -->
  

@endsection
