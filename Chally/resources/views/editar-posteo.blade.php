@extends('layouts/plantilla-header')
@section('title' , 'Editar-posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <div class="bg-gris">

        
        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center justify-content-center  flex-wrap">
                
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                        <h3 class="color-verde text-left mb-3 mx-0"><a href="feed.php"><i class="fas fa-arrow-left color-verde"></i></a>Editar Desafío</h3>
                        <form class="w-100 needs-validation" method="POST" action="edit-post.php" enctype="multipart/form-data">


                            <div class="form-row">
                                
                                <div class="col-12  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="inputName">Nombre del Desafío</label>
                                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Diseñá un póster alternativo para la nueva película '1917' " value="<?//=isset($desafio['nombre_desafio'])? $desafio['nombre_desafio']: "" ?>">
                                        <small>¡Describilo lo mejor posible en menos de 60 caracteres!</small>
                                        <?//=isset($errores['name']) ? $errores['name'] : ""?>
                                    </div>


                                    <div class="custom-file form-group my-3">                                       
                                        <label class="custom-file-label" for="inputGroupFile01">Foto principal del desafío</label>
                                        <input type="file" id="inputGroupFile01" class="custom-file-input" name="foto-desafio" aria-describedby="inputGroupFileAddon01">
                                        <small>Foto cuadrada ilustrativa del desafío (Tamaño recomendado: 1000x1000px)</small>
                                        <?//=isset($errores['foto-desafio']) ? $errores['foto-desafio'] : ""?>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="dificultad" class="font-weight-bold">Categoria</label>
                                        <select class="form-control" name="categoria" id="categoria">
                                            <option value="0">Seleccionar categoria</option>
                                            <option value="1" <?//=($desafio['categoria'] == '1') ? "selected": "" ?>>Diseño y Arte</option>
                                            <option value="2" <?//=($desafio['categoria'] == '2') ? "selected": "" ?>>Fotografia</option>
                                            <option value="3"<?//=($desafio['categoria'] == '3' )? "selected": "" ?> >Programacion y Logica</option>
                                        </select>
                                        <?//=isset($errores['categoria']) ? $errores['categoria'] : ""?>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion" class="font-weight-bold">Descripción del Desafío</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5"><?//=isset($desafio['descripcion']) ? $desafio['descripcion'] : ""?></textarea>
                                        <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="requisitos" class="font-weight-bold">Requisitos del Desafío</label>
                                        <textarea class="form-control" name="requisitos" id="requisitos" rows="5"> <?//=isset($desafio['requisitos']) ? $desafio['requisitos'] : ""?></textarea>
                                        <small>Colocá en formato lista todas las condiciones que creas necesarias para poder concretar el desafío (Reglas, Software, Formatos, etc)</small>
                                    </div>


                                    <div class="form-group mt-4">
                                        <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                        <select class="form-control" name="dificultad" id="dificultad" >
                                            <option value="1" <?//=($desafio['dificultad'] == '1') ? "selected": "" ?> > Muy fácil</option>
                                            <option value="2"  <?//=($desafio['dificultad'] == '2') ? "selected": "" ?> >Fácil</option>
                                            <option value="3" <?//=($desafio['dificultad'] == '3') ? "selected": "" ?> >Intermedio</option>
                                            <option value="4" <?//=($desafio['dificultad'] == '4') ? "selected": "" ?> >Difícil</option>
                                            <option value="5" <?//=($desafio['dificultad'] == '5') ? "selected": "" ?> >Experto</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold" for="fechaLimite">Fecha Límite de envío de respuestas</label>
                                        <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" placeholder="" value="<?//=isset($desafio['fecha_limite'])? $desafio['fecha_limite']:""?>">
                                        <small>¡El mínimo es de una semana!</small>
                                    </div>




                                </div>   
                                
                             


                                



                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                <!--
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                -->
                                        <div class="col-12 d-flex justify-content-between m-0 p-0">

                                            <button type="submit" class="btn btn-secondary">
                                            Publicar Desafío
                                            </button>
                                        </div>


                                </div>  
                            </form> 
                        </div>               
                    </div>

                        </section>
            </div>
@endsection