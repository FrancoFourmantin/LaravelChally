    @extends('layouts/plantilla-header')
    @section('title' , 'Resultados busqueda')
    @section('clases-body' , 'resultados-buscador animated fadeIn')
    
    @section('main')

    <script>
        var url_global='{{url("/")}}';
        var asset_global='{!! asset("") !!}';
        var asset_user_global='{{asset("/avatars/")}}';//solo es un ejemplo en caso de que tengas un mapeo organizado de carpetas. 
    </script>
    
    
    <main class="container vh-100">
        <div class="row">
            <section class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 busqueda-contenedor pt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-10 buscador-contenedor">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text busqueda-icon bg-white color-verde" id="basic-addon1"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control input-busqueda" placeholder="" aria-label="busqueda" aria-describedby="basic-addon1">
                        </div>  
                        <h1 class="mt-5">Resultados de tu busqueda: <span id="prev-search" class="color-verde d-block mt-3"></span></h1>         

                        
                        
                        {{-- Seccion respuestas --}}
                        <div class="row mt-5">
                            <div class="col-12">
                                <small>Aqui podes filtrar por categoria o resultados!</small>
                            </div>
                            <div class= "col-4">
                                <div class="list-group d-flex flex-row" id="list-tab" role="tablist">
                                    <a class="nav-item-busqueda list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" data-ref ='categorias' href="#list-categorias" role="tab" aria-controls="categorias">categorias</a>
                                    <a class="nav-item-busqueda list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" data-ref ='usuarios' href="#list-usuarios" role="tab" aria-controls="usuarios">usuarios</a>
                                    <a class="nav-item-busqueda list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" data-ref ='todo' href="#list-todo" role="tab" aria-controls="todo">todo</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-categorias" role="tabpanel" aria-labelledby="list-categorias-list">

                                    </div>
                                    <div class="tab-pane fade" id="list-usuarios" role="tabpanel" aria-labelledby="list-usuarios-list">

                                    </div>

                                    <div class="tab-pane fade" id="list-todo" role="tabpanel" aria-labelledby="list-todo-list">

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fin seccion respuestas --}}
                        
                        
                    </div>
                </div>
                
                
                
            </section>
            
            <section class="links-utiles-contenedor col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
                <div class="link-util link-util-title">
                    <div class="link-util-item">
                        <span class="font-weight-bolder">Links utiles</span>
                    </div>
                </div>


                <div data-href="/faq" class="link-escondido link-util p-3">
                    <div class="link-util-item">
                        <span class="font-weight-bolder"> &nbsp FAQ</span>
                    </div>
                    <div class="link-util-item link-util-icon">
                        <i class="fas fa-question"></i>
                    </div>
                </div>


                <div data-href="/editar-perfil" class="link-escondido link-util p-3">
                    <div class="link-util-item">
                        <span class="font-weight-bolder"> &nbsp Perfil</span>
                    </div>
                    <div class="link-util-item link-util-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                </div>

                <div data-href="/contacto" class="link-escondido link-util p-3">
                    <div class="link-util-item">
                        <span class="font-weight-bolder"> &nbsp Contacto</span>
                    </div>
                    <div class="link-util-item link-util-icon">
                        <i class="fas fa-at"></i>
                    </div>
                </div>


            </section>
        </div>
    </main>
    
<script src="{{asset('js/busqueda_resultados.js')}}"></script>
    @endsection