@extends('layouts/plantilla-header')
@section('title' , 'Crear posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')

<form class="" method="POST" action="crear" enctype="multipart/form-data">
    @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 create-menu">

            <div class="paso paso-activo  stepStatusCard my-5 mx-5 px-4 py-3 position-relative card shadow ">
                <span class="position-absolute color-verde texto-muygrande opacity-25" style="top:0px;right:22px">01</span>
                <h2 class="">Armado del desafío</h2>
                <p class="text-dark">En esta etapa vas a iniciar tu desafío en la categoría que quieras</p>
                <ul></ul>
            </div>

            <div class="paso my-5 mx-5 px-4 py-3 position-relative stepStatusCard">
                <span class="position-absolute color-gris texto-muygrande opacity-25" style="top:0px;right:22px">02</span>
                <h2 class="color-gris">Datos del desafío</h2>
                <p>En esta etapa colocarás los datos para que tu desafío se vea genial</p>
                <ul></ul>

            </div>            

            <div class="paso my-5 mx-5 px-4 py-3 position-relative stepStatusCard">
                <span class="position-absolute color-gris texto-muygrande opacity-25" style="top:0px;right:22px">03</span>
                <h2 class="color-gris">Configuración Final</h2>
                <p>En esta etapa harás ajustes finales antes de publicar tu desafío</p>
                <ul></ul>

            </div>       

        </div>

        <div class="step col-md-4 ml-5 mt-5 my-5 animated" id="step1">
            <h1 class="font-weight-bold">1. Armado del Desafío</h1>
            <p>¡Empecemos!</p>
            <hr class="mb-5">

                <div class="form-group">
                    <label class="font-weight-bold" for="">Seleccioná la categoría de tu desafío</label>

                    <div class="col-12">
                        <div class="row option-list-squares d-flex justify-content-between">
                            
                            @foreach ($categorias as $categoria)
                                <div class="col-md-3 rounded mx-0 px-0" data-value="{{$categoria->id}}">
                                    <div class="d-flex flex-column justify-content-center align-items-center content">
                                        <img id="iconito" style="height:75%;width:100%" src="{{asset('categories/icons/002-art-and-design.svg')}}"> 
                                        <p class="mb-0 color-gris">{{$categoria->nombre}}</p>
                                    </div>
                                </div>
                            @endforeach


                                <select class="card-field d-none" name="id_categoria" data-icon="true" data-name="Categoría"  id="id_categoria" required>
                                    <option value="0">Seleccioná una opción</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>

                        </div>
                    </div>
                </div>

                <div class="form-group mt-5">
                    <label class="font-weight-bold" for="">Seleccioná la subcategoría</label>
                    <select class="form-control card-field" name="id_subcategoria" id="subcategoria" data-name="Subcategoría" inputname = "Subcategoría" required>
                        <option value="0">Selecciona una opción</option>


                    </select>
                </div>

                <div class="form-group mt-5">
                    <label class="font-weight-bold" for="">Ponele un buen título</label>
                    <input type="text" class="form-control card-field" name="nombre" id="inputName" placeholder="Título del Desafío" inputname = "Título del Desafío" data-min="10" data-max="70" data-type="string" data-name="Título">
                </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button id="submitStep1" type="return" class="d-none btn btn-lg btn-outline-secondary font-weight-light mt-4">
                        VOLVER
                    </button>
                    <button id="submitStep1" type="submit" class="btn btn-lg btn-outline-success font-weight-light mt-4 next">
                        SIGUIENTE <i class="fas fa-angle-right"></i>
                    </button>
                </div>


        </div> <!-- CIERRE STEP 1-->



        <div class="step col-md-4 ml-5 mt-5 my-5 d-none animated" id="step2">
            <h1 class="font-weight-bold">2. Datos del Desafío</h1>
            <p>¡Hagamos que tu desafío se vea interesante!</p>
            <hr class="mb-5">



            <div class="form-group mt-5">
                <label for="descripcion" class="font-weight-bold ">Descripción</label>
                <textarea data-name="Descripción" data-min="30" data-max="600" placeholder="En este desafío vas a poner a prueba tu creatividad y tus habilidades en fotomontaje para componer una imagen de un ícono de la cultura pop nacional." class="form-control card-field @error ('descripcion') is-invalid @enderror" name="descripcion" inputname = "Descripción" id="descripcion" rows="4" >{{old('descripcion')}}</textarea>
            </div>


            <div class="form-group requisitos mt-5">
                <label for="requisitos" class="font-weight-bold">Reglas y Requisitos</label>
                <small>Añadí hasta 5 reglas de forma opcional</small>
                <input class="form-control mb-2 requirementField" name="requisitos-01" id="requisitos-01" type="text" placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                <input class="form-control mb-2 requirementField" name="requisitos-02" id="requisitos-02" type="text" >
                <input class="form-control mb-2 requirementField" name="requisitos-03" id="requisitos-03" type="text" >
                <input class="form-control mb-2 requirementField" name="requisitos-04" id="requisitos-04" type="text" >
                <input class="form-control mb-2 requirementField" name="requisitos-05" id="requisitos-05" type="text" >
                <br>
                <input class="card-field" type="hidden" class="form-control mb-2 d-none" name="finalreq" type="text" data-name="Reglas">
            </div>


            <div class="custom-file form-group my-3">
                    <label class="font-weight-bold" for="inputGroupFile01">Foto de portada</label>
                    <img class="img-fluid" id="output">
                    <input type="file" id="inputGroupFile01" class="card-field form-control-file" name="imagen" value="{{old('imagen')}}" data-name="Portada">
            </div>







                <div class="d-flex justify-content-between">
                    <button id="submitStep2" type="return" class="btn btn-lg btn-outline-secondary font-weight-light mt-4">
                        VOLVER
                    </button>
                    <button id="submitStep2" type="submit" class="btn btn-lg btn-outline-success font-weight-light mt-4 next">
                        SIGUIENTE <i class="fas fa-angle-right"></i>
                    </button>
                </div>


        </div> <!-- CIERRE STEP 2-->


        <div class="step col-md-4 ml-5 mt-5 my-5 d-none animated" id="step3">
            <h1 class="font-weight-bold">3. Configuración Final</h1>
            <p>¡Ya casi estás listo para publicar tu desafío!</p>
            <hr class="mb-5">
            

                <div class="form-group mt-5">
                    <label class="font-weight-bold" for="">¿Cuál es el tiempo límite de respuesta?</label>

                    <div class="col-12">
                        <div class="row option-list-squares d-flex justify-content-between">
                            
                            <div class="col-md-3 rounded mx-0 px-0" data-value="7">
                                <div class="d-flex flex-column justify-content-center align-items-center content">
                                    <h1>1</h1>
                                    <p class="mb-0 color-gris">Semana</p>
                                </div>
                            </div>

                            <div class="col-md-3 rounded mx-0 px-0" data-value="14">
                                <div class="d-flex flex-column justify-content-center align-items-center content">
                                    <h1>2</h1>
                                    <p class="mb-0 color-gris">Semanas</p>
                                </div>
                            </div>

                            <div class="col-md-3 rounded mx-0 px-0" data-value="21">
                                <div class="d-flex flex-column justify-content-center align-items-center content">
                                    <h1>3</h1>
                                    <p class="mb-0 color-gris">Semanas</p>
                                </div>
                            </div>

                            <select class="card-field d-none" name="duracion" data-name="Duración"  id="duracion" data-icon="true" required>
                                    <option value="0">Selecciona una opción</option>
                                    <option value="7">1 Semana</option>
                                    <option value="14">2 Semanas</option>
                                    <option value="21">3 Semanas</option>
                             </select>

                        </div>
                    </div>
                </div>




                <div class="d-flex justify-content-between">
                    <button id="submitStep2" type="return" class="btn btn-lg btn-outline-secondary font-weight-light mt-4">
                        VOLVER
                    </button>
                    <button id="submitStep2" type="submit" class="d-none btn btn-lg btn-outline-success font-weight-light mt-4 next">

                    <button id="submitStep2" type="submit" class="btn btn-lg btn-outline-success font-weight-light mt-4 end">
                        PUBLICAR <i class="fas fa-angle-right"></i>
                    </button>
                </div>


        </div> <!-- CIERRE STEP 3-->



    </div>

</div>
</form>

<!--
<form class="w-100 needs-validation" method="POST" action="crear" id="nuevoDesafio" enctype="multipart/form-data">
    @csrf
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
                                    <input type="text" class="form-control @error ('nombre') is-invalid @enderror" name="nombre" id="inputName" value="{{old('nombre')}}" placeholder="Diseñá un ícono de cultura pop con onda vaporwave" inputname = "Título del Desafío">
                                    <small class="d-none invalid-feedback"></small>
                                    <small class="text-danger"> @error ('nombre') {{$message}} @enderror </small>
                                </div>


                                <div class="form-group mt-4">
                                    <label for="categoria" class="font-weight-bold">Categoría</label>
                                    <select class="form-control @error ('categoria') is-invalid @enderror" name="id_categoria" id="categoria" inputname = "Categoría Principal">
                                        
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}" {{ old('id_categoria') == "0" ? "selected" : ""}}>{{$categoria->nombre}}</option>
                                        @endforeach


                                    </select>
                                    <small class="d-none invalid-feedback">¡Debés seleccionar una categoría válida!</small>

                                    <??>
                            </div>
                            
                                <small class="text-danger"> @error ('id_subcategoria') {{$message}} @enderror </small>

                            <div class="form-group mt-4">
                                    <label for="subcategoria" class="font-weight-bold">Subcategoría</label>
                                    <select class="form-control" name="id_subcategoria" id="subcategoria" inputname = "Subcategoría">
 
                                    </select>
                                    <small class="d-none invalid-feedback">¡Debés seleccionar una subcategoría válida!</small>

                                    <??>
                            </div>
                                <small class="text-danger"> @error ('id_subcategoria') {{$message}} @enderror </small>


                            <div class="custom-file form-group my-3">
                                    <label class="font-weight-bold" for="inputGroupFile01">Foto del desafío</label>
                                    <input type="file" id="inputGroupFile01" class="form-control-file" name="imagen" value="{{old('imagen')}}">
                                    <img class="img-fluid opacity-0" id="output">

                                    <small>¡Una foto atractiva hará que más gente se interese en tu desafío! (Tamaño recomendado: 1000x1000px)</small>
                                    <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>
                            </div>


                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold ">Resumen del Desafío</label>
                                <textarea placeholder="En este desafío vas a poner a prueba tu creatividad y tus habilidades en fotomontaje para componer una imagen de un ícono de la cultura pop nacional." class="form-control @error ('descripcion') is-invalid @enderror" name="descripcion" inputname = "Descripción" id="descripcion" rows="2" >{{old('descripcion')}}</textarea>
                                <small class="d-none invalid-feedback">¡Ups, la descripción es muy corta! Debe tener un mínimo de 30 caracteres.</small>
                                <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                            </div>

                            <div class="form-group requisitos">
                                <label for="requisitos" class="font-weight-bold">Requisitos y Reglas del Desafío</label>
                                <input class="form-control mb-2" name="requisitos-01" id="requisitos-01" type="text" placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                <input class="form-control mb-2 d-none" name="requisitos-02" id="requisitos-02" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-03" id="requisitos-03" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-04" id="requisitos-04" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-05" id="requisitos-05" type="text" >


                                <button type="button" class="btn btn-sm btn-success" id="addMore"><i class="fas fa-plus"></i> Agregar más requisitos </button>
                                <br>
                                <small>Mínimo:1 Requisito | Máximo: 5 Requisitos</small>
                            </div>

                            </div>

                </div>
            </div>


            <div class="col-12 col-md-8 offset-lg-1 col-lg-6 shadow contacto-form px-4 py-3 my-3 opacity-0" id="step-2">


                    <div class="form-row">

                        <div class="col-12  mb-0 mb-md-4 ">

                            <h4 class="ml-0 color-verde">Detalles del desafío</h4>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold ">Resumen del Desafío</label>
                                <textarea placeholder="En este desafío vas a poner a prueba tu creatividad y tus habilidades en fotomontaje para componer una imagen de un ícono de la cultura pop nacional." class="form-control @error ('descripcion') is-invalid @enderror" name="descripcion" inputname = "Descripción" id="descripcion" rows="2" >{{old('descripcion')}}</textarea>
                                <small class="d-none invalid-feedback">¡Ups, la descripción es muy corta! Debe tener un mínimo de 30 caracteres.</small>
                                <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                            </div>

                            <div class="form-group requisitos">
                                <label for="requisitos" class="font-weight-bold">Requisitos y Reglas del Desafío</label>
                                <input class="form-control mb-2" name="requisitos-01" id="requisitos-01" type="text" placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                <input class="form-control mb-2 d-none" name="requisitos-02" id="requisitos-02" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-03" id="requisitos-03" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-04" id="requisitos-04" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-05" id="requisitos-05" type="text" >


                                <button type="button" class="btn btn-sm btn-success" id="addMore"><i class="fas fa-plus"></i> Agregar más requisitos </button>
                                <br>
                                <small>Mínimo:1 Requisito | Máximo: 5 Requisitos</small>
                            </div>



                            <div class="form-group mt-4">
                                <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                <select class="form-control @error ('dificultad') is-invalid @enderror" name="dificultad" id="dificultad" inputname ="Dificultad">
                                    <option value="0" {{ old('dificultad') == "0" ? "selected" : ""}} >Selecciona una opción</option>
                                    <option value="1" {{ old('dificultad') == "1" ? "selected" : ""}} >Muy fácil</option>
                                    <option value="2" {{ old('dificultad') == "2" ? "selected" : ""}}>Fácil</option>
                                    <option value="3" {{ old('dificultad') == "3" ? "selected" : ""}}>Intermedio</option>
                                    <option value="4" {{ old('dificultad') == "4" ? "selected" : ""}} >Difícil</option>
                                    <option value="5" {{ old('dificultad') == "5" ? "selected" : ""}}>Experto</option>
                                </select>
                                <small class="d-none invalid-feedback">Debés elegir una dificultad de la lista</small>

                            </div>
                            <small class="text-danger"> @error ('dificultad') {{$message}} @enderror </small>


                            <div class="form-group mt-4">
                                <label class="font-weight-bold" for="fechaLimite">Fecha Límite de envío de respuestas</label>
                                <select class="form-control @error ('fecha_limite') is-invalid @enderror" name="fecha_limite" id="fechaLimite" inputname="Fecha Límite">
                                    <option value="0" {{ old('fecha_limite') == "0" ? "selected" : ""}}  >Selecciona una opción</option>
                                    <option value="7" {{ old('fecha_limite') == "7" ? "selected" : ""}}  >Una semana</option>
                                    <option value="14" {{ old('fecha_limite') == "14" ? "selected" : ""}}>Dos semanas</option>
                                    <option value="30" {{ old('fecha_limite') == "30" ? "selected" : ""}}>Un mes</option>
                                </select>
                                <small class="d-none invalid-feedback">Debés elegir el tiempo de expiración del desafío</small>

                                <small class="text-danger"> @error ('fecha_limite') {{$message}} @enderror </small>

                            </div>

                            <input name="requisitos" id="requisitos" value="" type="hidden">
                            <small class="text-danger"> @error ('requisitos') {{$message}} @enderror </small>




                        </div>









                        <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">

                            <div class="col-12 d-flex justify-content-between m-0 p-0">

                                <button id="submit-desafio" type="submit" class="btn btn-dark" disabled>
                                    Publicar Desafío
                                </button>
                            </div>


                        </div>
                        
            </div>



                



                
            </div>

        </section>

    </div>
</form>




-->


<script>


    // Creo un array con todos los steps
    const steps = Array.from(document.querySelectorAll(".step"));
    const stepStatusCards = Array.from(document.querySelectorAll(".stepStatusCard"));
    
    // Defino la posición inicial del Form
    let currentStep = 0;
    let currentCard = 0;

    // Creo la funcion para correr toda la lógica
    getEndButton().addEventListener("click",function(){console.log("FIN")});
    steps.forEach(step => getSubmitButton(step).addEventListener("click", processStep ));
    steps.forEach(step => getPreviousButton(step).addEventListener("click", returnStep ));

    processOptionLists(steps[currentStep],steps[currentStep].querySelector("#id_categoria"));


    // Obtengo el botón de cada Step
    function getSubmitButton(step){

        if(step.querySelector("button.next")){
            return step.querySelector("button.next");
        }
    }

    function getEndButton(){
        return document.querySelector("button.end");
    }

    function getPreviousButton(step){
        return step.querySelector("button[type=return]");
    }

    // Obtengo los Fields de cada step
    function getStepFields(step){
        return Array.from(step.querySelectorAll(".card-field"));
    }

    // Creo el HTML de cada respuesta al field
    function createHTMLCorrectFields(fields){
        return fields.map(field => {
            // HTML Para Inputs Estándar
            if(field.tagName === "INPUT" && field.type != "file"){
                return `<li class="d-flex"><i class="fas fa-check  animated rubberBand">&nbsp;&nbsp;</i><div><span class="font-weight-medium">${field.dataset.name}:</span>&nbsp;&nbsp;${field.value}</div></li>`;
            }

            // HTML Para Inputs de Imágenes
            else if(field.tagName === "INPUT" && field.type === "file"){
                return `<li class="d-flex"><i class="fas fa-check  animated rubberBand">&nbsp;&nbsp;</i><div><span class="font-weight-medium">${field.dataset.name}:</span>&nbsp;&nbsp; <a target="_blank" href="${output.src}"> <i class="far fa-image"></i> </a></div> </li>`;
            }

            // HTML Para Select
            else if(field.tagName === "SELECT"){
                let value = field.options[field.selectedIndex].innerText;
                return `<li class="d-flex"><i class="fas fa-check  animated rubberBand">&nbsp;&nbsp;</i><div><span class="font-weight-medium">${field.dataset.name}:</span>&nbsp;&nbsp;${value}</div></li>`;
            }

            // HTML Para Textareas
            else if(field.tagName === "TEXTAREA"){
                return `<li class="d-flex"><i class="fas fa-check  animated rubberBand">&nbsp;&nbsp;</i><div><span class="font-weight-medium">${field.dataset.name}:</span>&nbsp;&nbsp;${field.value}</div></li>`;
            }
        });
        
    }

    // Muestro el HTML en la card correspondiente
    function showCorrectFields(fields){
        // Convierto el Array de Fields en un texto de corrido
        let text = fields.join("");

        // Escondo el Parrafo Descriptivo del Step
        stepStatusCards[currentCard].querySelector("p").classList.add("d-none");

        // Verifico si estoy volviendo para atrás. Si estoy volviendo, entonces borro el HTML creado previamente
        if(stepStatusCards[currentCard].querySelector("li")){
            let previousElements = stepStatusCards[currentCard].querySelectorAll("li");
            previousElements.forEach(element => element.remove());
            stepStatusCards[currentCard].insertAdjacentHTML('beforeend',text);
        }

        // Si no estoy volviendo, los creo sin borrar nada
        else{
            stepStatusCards[currentCard].insertAdjacentHTML('beforeend',text);
        }

    }


    // Acá proceso el evento de Step Siguiente
    function processStep(e){
        e.preventDefault();

        // Obtengo todos los campos del Step Actual
        let fields = getStepFields(steps[currentStep]);

        // Verifico si hay algún campo de tipo Lista y lo proceso de forma manual
        fields.forEach( field => {
            if(field.name === "finalreq"){
                processRequirementFields(steps[currentStep],field);
            }
        } )

        let errorTest = fields.map(field => errorCheck(field));

        function errorCheck(field){
            if(field.dataset.type == "string" || field.tagName == "TEXTAREA"){
                return field.value.length < field.dataset.min || field.value.length > field.dataset.max ? `El campo debe tener entre ${field.dataset.min} y ${field.dataset.max} caracteres` : "";
            }

            else if (field.tagName == "SELECT"){
                let selectedValues = Array.from(field.querySelectorAll("option"));
                selectedValues = selectedValues.map(fieldValue => fieldValue.value);
                selectedValues = selectedValues.filter(value => value != 0);
                return !selectedValues.includes(field.value) ?  `La opción seleccionada no es válida` : "";
            }
        }

        console.log(errorTest);



        
        if(errorTest.every(error => !error)){
            steps[currentStep].classList.toggle("fadeOutDown");

            // Creo el HTML para la card correspondiente al field
            let fieldsText = createHTMLCorrectFields(fields);

            // Muestro el HTML previamente creado
            showCorrectFields(fieldsText);

            // Tiro un setTimeout para que las animaciones funcionen bien
            setTimeout(function() { 
                // Todos los cambios visuales
                setStyles(currentStep);
                setIconColors(currentStep);
                // Paso al Step y la Card siguientes
                currentStep++;
                currentCard++;
                


                // Verifico si hay algún campo con opciones en formato icono
                let nextFields = getStepFields(steps[currentStep]);
                nextFields.forEach(field => {
                    if(field.dataset.icon === "true"){
                        console.log("hay en")
                        console.log(field);
                        processOptionLists(steps[currentStep],field);
                    }
                } )
                
            }, 
            500);
        }
        else{
            fields.forEach((field,index) => {

                if(field.nextElementSibling){
                    field.nextElementSibling.remove();
                }

                if (errorTest[index]) {
                    field.insertAdjacentHTML("afterend",`<small class="text-danger animated fadeIn">${errorTest[index]}</small>`);
                }
            });
        }
    }


    // Acá proceso el evento de Step Anterior
    function returnStep(e){
        e.preventDefault();
        steps[currentStep-1].classList.toggle("fadeOutDown");

        // Obtengo todos los campos del Step
        let fields = getStepFields(steps[currentStep - 1]);

        // Verifico si hay algún Step de tipo Lista y lo proceso de forma manual
        fields.forEach( field => {
            if(field.name === "finalreq"){
                processRequirementFields(steps[currentStep-1],field);
            }
        })

        // Tiro un setTimeout para que las animaciones funcionen bien
        setTimeout(function() { 
            // Todos los cambios visuales
            setStyles(currentStep-1);
            setIconColors(currentStep-1);
            // Paso al Step y la Card anteriores
            currentStep--;
            currentCard--;
        }, 
        500);
    }



    function setIconColors(numeroActual){
            let icons = stepStatusCards[numeroActual].querySelectorAll("i");
            icons.forEach(icon => {
                icon.classList.toggle("color-verde");
                icon.classList.toggle("rubberBand");
            });
    }

    function setStyles(numeroActual){
            // STATUS CARDS
            stepStatusCards[numeroActual].classList.toggle("card");
            stepStatusCards[numeroActual].classList.toggle("shadow");
            stepStatusCards[numeroActual].querySelector("h2").classList.toggle("text-dark");
            stepStatusCards[numeroActual].querySelector("h2").classList.toggle("color-gris");
            stepStatusCards[numeroActual].querySelector("span").classList.toggle("color-verde");
            stepStatusCards[numeroActual].querySelector("span").classList.toggle("color-gris");
            stepStatusCards[numeroActual+1].querySelector("h2").classList.toggle("text-dark");
            stepStatusCards[numeroActual+1].querySelector("span").classList.toggle("color-gris");
            stepStatusCards[numeroActual+1].querySelector("span").classList.toggle("color-verde");
            stepStatusCards[numeroActual+1].classList.toggle("card");
            stepStatusCards[numeroActual+1].classList.toggle("shadow");
            // STEPS
            steps[numeroActual].classList.toggle("d-none");
            steps[numeroActual+1].classList.toggle("fadeInDown");
            steps[numeroActual].classList.toggle("fadeInDown");
            steps[numeroActual+1].classList.toggle("d-none");
    }


    // Obtengo si es que hay fields de seleccion de opción con icono
    function processOptionLists(step,field){
        if(!step.querySelector(".option-list-squares > div")){
            return;
        }
        let options = step.querySelectorAll(".option-list-squares > div");
        let fieldToFill = step.querySelector(`#${field.name}`);
        console.log(fieldToFill);
        options.forEach(option => option.addEventListener("click", e => {
            console.log(`Clickee en una opción`);

            // Borro todas las marcas previamente
            options.forEach(optionRemover => optionRemover.classList.remove("opcionseleccionada"));

            // Marco la elegida
            option.classList.add("opcionseleccionada");
            fieldToFill.value = option.dataset.value;
            console.log(fieldToFill.value);

            if(fieldToFill.id == "id_categoria"){
                let fieldSubcategoria = document.querySelector("#subcategoria");
                ajaxSubcategory(fieldSubcategoria,fieldToFill);
            }
        }))
    }


    // Obtengo si es que hay fields multi-item como los requisitos por ejemplo
    function processRequirementFields(step,field){
            requirementFields = Array.from(step.querySelectorAll(".requirementField"));
            requirementFields = requirementFields.filter(field => field.value);
            let values = requirementFields.reduce(reducer,"");
            function reducer(contador,item){
                contador =contador + "<br>" + item.value ;
                return contador;
            }
            field.value=values;
    }


    function showImageBeforeUpload(imagen,e){
        let output = document.getElementById(imagen);
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");
    }

    let imagen = document.querySelector("input[name=imagen]");
    let output = document.querySelector("#output");
    imagen.addEventListener('change',function(e){
        showImageBeforeUpload('output',e);
    })


    function ajaxSubcategory(fieldSubcategory,fieldMain){
        fieldSubcategory.innerHTML = `<select class="form-control" name="id_subcategoria" id="subcategoria"> <option value="0">Seleccioná una opción </option> </select>`;
        fetch('/categoriasApi')
        .then(function(response){
            return response.json();
        })
        .then(function(data){
            for(var n of data){
                if(fieldMain.value == n.parent_id){
                    fieldSubcategory.innerHTML = fieldSubcategory.innerHTML + `<option value="${n.id}">${n.nombre}</option>`
                    
                }
            }
        })
        .catch(function(error){
            "Hubo un error";
        })
    }


</script>
@endsection