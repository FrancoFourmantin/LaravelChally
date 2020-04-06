@extends('layouts/plantilla-header')
@section('title' , 'Editar posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')

<form class="w-100 needs-validation" method="POST" action="{{$desafio->id}}" id="nuevoDesafio" enctype="multipart/form-data">
    @csrf
    {{-- <input type="hidden" value="{{$desafio->id}}" name="id_desafio"> --}}
    <div class="bg-gris-claro">
        
        <section class="container pt-1 pb-4">
            <div class="row align-items-start">
                
                <div class="col-12">
                    <p class="color-verde text-left mt-3 mb-1 mx-0"><a href="../feed"><i class="fas fa-arrow-left color-verde"></i></a>&nbsp;Volver atrás</p>
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="../feed"></a> Nuevo Desafío</h3>
                    <hr>
                </div>
                
                
                <div class="col-12 col-md-8 col-lg-5 shadow contacto-form px-3 py-3 my-3 d-flex flex-row align-items-start">
                    
                    
                    
                    
                    <div class="form-row">
                        
                        <div class="col-12  mb-0 mb-md-4 ">
                            
                            <h4 class="ml-0 color-verde">Datos iniciales del desafío</h4>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="inputName">Título del Desafío</label>
                                <input type="text" class="form-control is-valid @error ('nombre') is-invalid @enderror" name="nombre" id="inputName" value="{{$desafio->nombre}}" placeholder="Diseñá un ícono de cultura pop con onda vaporwave">
                                <small class="d-none invalid-feedback">¡El título del desafío debe tener al menos 10 caracteres!</small>
                                <small class="text-danger"> @error ('nombre') {{$message}} @enderror </small>
                            </div>
                            
                            
                            <div class="form-group mt-4">
                                <label for="categoria " class="font-weight-bold">Categoría</label>
                                <select class="is-valid form-control @error ('categoria') is-invalid @enderror" name="id_categoria" id="categoria">
                                    
                                    @foreach($categorias as $categoria)
                                    @if($categoria->parent_id == NULL)
                                    <option value="{{$categoria->id}}" {{ $categoria->id == $desafio->getCategoria->id ? "selected" : ""}}>{{$categoria->nombre}}</option>
                                    @endif
                                    @endforeach
                                    
                                    
                                </select>
                                <small class="d-none invalid-feedback">¡Debés seleccionar una categoría válida!</small>
                                
                                <??>
                            </div>
                            
                            <small class="text-danger"> @error ('id_categoria') {{$message}} @enderror </small>
                            
                            <div class="form-group mt-4">
                                <label for="subcategoria" class="font-weight-bold">Subcategoría</label>
                                <select class="form-control is-valid" name="id_subcategoria" id="subcategoria">
                                    
                                </select>
                                <small class="d-none invalid-feedback">¡Debés seleccionar una subcategoría válida!</small>
                                
                                <??>
                            </div>
                            <small class="text-danger"> @error ('id_categoria') {{$message}} @enderror </small>
                            
                            
                            <div class="custom-file form-group my-3">
                                <label class="font-weight-bold" for="inputGroupFile01">Foto del desafío</label>
                                <input type="file" id="inputGroupFile01" class="form-control-file" name="imagen" value="{{old('imagen')}}">
                                <img class="img-fluid" src="{{asset("desafios/" . $desafio->imagen)}}" id="output">
                                
                                <small>¡Una foto atractiva hará que más gente se interese en tu desafío! (Tamaño recomendado: 1000x1000px)</small>
                                <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="col-12 col-md-8 offset-lg-1 col-lg-6 shadow contacto-form px-4 py-3 my-3" id="step-2">
                    
                    
                    <div class="form-row">
                        
                        <div class="col-12  mb-0 mb-md-4 ">
                            
                            <h4 class="ml-0 color-verde">Detalles del desafío</h4>
                            
                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold ">Resumen del Desafío</label>
                                <textarea placeholder="En este desafío vas a poner a prueba tu creatividad y tus habilidades en fotomontaje para componer una imagen de un ícono de la cultura pop nacional." class="form-control is-valid @error ('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="2" ><?php echo str_replace("</br>","",$desafio->descripcion); ?></textarea>
                                <small class="d-none invalid-feedback">¡Ups, la descripción es muy corta! Debe tener un mínimo de 30 caracteres.</small>
                                <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                            </div>
                            
                            <div class="form-group requisitos">
                                <label for="requisitos" class="font-weight-bold">Requisitos y Reglas del Desafío</label>
                                <?php $listadoReq = explode("</li>",$desafio->requisitos);
                                
                                ?>
                                
                                
                                <input class="form-control mb-2" name="requisitos-01" id="requisitos-01" type="text" value="<?php echo str_replace("<li>","",$listadoReq[0]); ?> " placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                    
                                    <input class="form-control mb-2" name="requisitos-02" id="requisitos-02" type="text" value="<?php echo str_replace("<li>","",$listadoReq[1]); ?> " placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                        
                                        <input class="form-control mb-2" name="requisitos-03" id="requisitos-03" type="text" value="<?php echo str_replace("<li>","",$listadoReq[2]); ?> " placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                            
                                            <input class="form-control mb-2" name="requisitos-04" id="requisitos-04" type="text" value="<?php if(array_key_exists(3,$listadoReq)) { echo str_replace("<li>","",$listadoReq[3]); }?>" >
                                                
                                                <input class="form-control mb-2" name="requisitos-05" id="requisitos-05" type="text" value="<?php if(array_key_exists(4,$listadoReq)) { echo str_replace("<li>","",$listadoReq[4]); } ?> " >
                                                    

                                                    <button type="button" class="d-none" id="addMore"><i class="fas fa-plus"></i> Agregar más requisitos </button>
                                                    <br>

                                                    <small>Mínimo:1 Requsito | Máximo: 5 Requisitos</small>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group mt-4">
                                                    <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                                    <select class="form-control is-valid @error ('dificultad') is-invalid @enderror" name="dificultad" id="dificultad">
                                                        <option value="0" {{ $desafio->dificultad == "0" ? "selected" : ""}} >Selecciona una opción</option>
                                                        <option value="1" {{ $desafio->dificultad == "1" ? "selected" : ""}} >Muy fácil</option>
                                                        <option value="2" {{ $desafio->dificultad == "2" ? "selected" : ""}}>Fácil</option>
                                                        <option value="3" {{ $desafio->dificultad == "3" ? "selected" : ""}}>Intermedio</option>
                                                        <option value="4" {{ $desafio->dificultad == "4" ? "selected" : ""}} >Difícil</option>
                                                        <option value="5" {{ $desafio->dificultad == "5" ? "selected" : ""}}>Experto</option>
                                                    </select>
                                                    <small class="d-none invalid-feedback">Debés elegir una dificultad de la lista</small>
                                                    
                                                </div>
                                                <small class="text-danger"> @error ('dificultad') {{$message}} @enderror </small>
                                                
                                                
                                                
                                                
                                                <input name="requisitos" id="requisitos" value="" type="hidden">
                                                <small class="text-danger"> @error ('requisitos') {{$message}} @enderror </small>
                                                
                                                
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                                <!--
                                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                                -->
                                                <div class="col-12 d-flex justify-content-between m-0 p-0">
                                                    
                                                    <button type="submit" class="btn btn-success">
                                                        Editar Desafío
                                                    </button>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                </section>
                                
                            </div>
                        </form>
                        
                        
                        <script>
 
                        </script>


                        <script>
                            validarCreacionDesafio();
                        </script>
                        
                        
                        
                        @endsection
                        
                        