
function validarCreacionDesafio(){
    let form = document.querySelector("#nuevoDesafio");
    let campos = form.elements;
    let step2 = document.querySelector("#step-2");
    let submitButton= document.querySelector("button[type='submit']");
    let errorCount = 0;
    
    for(campito of campos){
        if(campito.classList.contains("is-invalid")){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
    }
    
    campos[1].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 10){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
    campos[2].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
            campos[3].innerHTML = `<select class="form-control" name="id_subcategoria" id="subcategoria"> <option value="0">Seleccioná la subcategoría </option> </select>`;
            fetch('/categoriasApi')
            .then(function(response){
                return response.json();
            })
            .then(function(data){
                for(var n of data){
                    if(campos[2].value == n.parent_id){
                        campos[3].innerHTML = campos[3].innerHTML + `<option value="${n.id}">${n.nombre}</option>`
                        
                    }
                }
            })
            .catch(function(error){
                "Hubo un error";
            })
            
        }
    })
    
    
    campos[3].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })
    
    
    campos[4].addEventListener('change',function(e){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");
        
    })
    
    
    
    
    document.addEventListener('change',function(e){
        if(campos[1].classList.contains("is-invalid") || campos[2].classList.contains("is-invalid") || campos[3].classList.contains("is-invalid")) {
            
        }
        else if (campos[1].classList.contains("is-valid") && campos[2].classList.contains("is-valid") && campos[3].classList.contains("is-valid") && output.src ){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
        
        errorCount = 0;
        for(campito of campos){
            if(campito.classList.contains("is-invalid") || (campito.value=="0")){
                errorCount = errorCount+1;
            }
        }
        
        if(errorCount > 0){
            submitButton.disabled=true;
            submitButton.classList.add("btn-dark");
            submitButton.classList.remove("btn-secondary");
            
        }
        else{
            submitButton.disabled=false;
            submitButton.classList.remove("btn-dark");
            submitButton.classList.add("btn-secondary");
        }
        
    })
    
    campos[5].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 30){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    })
    
    let camposDeRequisitos = document.querySelectorAll(".requisitos > input");
    let agregarRequisito = document.querySelector("#addMore");
    let req;
    let clickCount = 0;
    agregarRequisito.addEventListener("click",function(){
        
        
        req = document.querySelector(".requisitos > input.d-none")
        req.classList.remove("d-none");
        req.focus();
        clickCount = clickCount + 1;
        
        if(clickCount == 4){
            agregarRequisito.classList.remove("btn-success");
            agregarRequisito.classList.add("btn-dark");
            agregarRequisito.disabled=true;
        }
        
    })
    
    document.addEventListener('change',function(){
        campos[14].value="";
        camposDeRequisitos.forEach(function(requisito){
            if(requisito.value != ""){
                campos[14].value= campos[14].value + "<li>" + requisito.value + "</li>";
            }
            
            console.log(campos[14].value);
        })
        
    })
    
    campos[12].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
    campos[13].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
}





function validarModificacionDesafio(){
    let form = document.querySelector("#nuevoDesafio");
    let campos = form.elements;
    console.log(campos);
    let step2 = document.querySelector("#step-2");
    let submitButton= document.querySelector("button[type='submit']");
    let errorCount = 0;
    
    
    
    window.onload = function(){
        
        fetch('/categoriasApi')
        .then(function(response){
            return response.json();
        })
        .then(function(data){
            for(var n of data){
                if(campos[2].value == n.parent_id){
                    campos[3].innerHTML = campos[3].innerHTML + `<option value="${n.id}">${n.nombre}</option>`
                    
                }
            }
        })
        .catch(function(error){
            "Hubo un error";
        })
        
        
    };
    
    for(campito of campos){
        if(campito.classList.contains("is-invalid")){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
    }
    
    campos[1].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 10){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
    campos[2].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
            campos[3].innerHTML = `<select class="form-control" name="id_subcategoria" id="subcategoria"> <option value="0">Seleccioná la subcategoría </option> </select>`;
            fetch('/categoriasApi')
            .then(function(response){
                return response.json();
            })
            .then(function(data){
                for(var n of data){
                    if(campos[2].value == n.parent_id){
                        campos[3].innerHTML = campos[3].innerHTML + `<option value="${n.id}">${n.nombre}</option>`
                        
                    }
                }
            })
            .catch(function(error){
                "Hubo un error";
            })
            
        }
    })
    
    
    campos[3].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })
    
    
    campos[4].addEventListener('change',function(e){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");
        
    })
    
    
    
    
    document.addEventListener('change',function(e){
        if(campos[1].classList.contains("is-invalid") || campos[2].classList.contains("is-invalid") || campos[3].classList.contains("is-invalid")) {
            
        }
        else if (campos[1].classList.contains("is-valid") && campos[2].classList.contains("is-valid") && campos[3].classList.contains("is-valid") && output.src ){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
        
        errorCount = 0;
        for(campito of campos){
            if(campito.classList.contains("is-invalid") || (campito.value=="0")){
                errorCount = errorCount+1;
            }
        }
        
        if(errorCount > 0){
            submitButton.disabled=true;
            submitButton.classList.add("btn-dark");
            submitButton.classList.remove("btn-secondary");
            
        }
        else{
            submitButton.disabled=false;
            submitButton.classList.remove("btn-dark");
            submitButton.classList.add("btn-secondary");
        }
        
    })
    
    campos[5].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 30){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    })
    
    let camposDeRequisitos = document.querySelectorAll(".requisitos > input");
    
    
    
    
    campos[12].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
    campos[13].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
            
        }
    })
    
}











function validarModificacionDePerfil(){
    
    
    
    
    let modificadorPassword = document.querySelector(".modificar-datos-personales");
    let botonModificadorPassword = document.querySelector("#boton-modificar-password");
    
    botonModificadorPassword.addEventListener("click",function(){
        modificadorPassword.classList.remove("d-none","opacity-0");
        this.classList.add("d-none");
    })
    
    let form = document.querySelector("#edicion-perfil");
    let submitButton = document.querySelector("button[type='submit']");
    let campos = form.elements;
    let campoNombre = document.querySelector("#nombre");
    let campoApellido = document.querySelector("#apellido");
    let campoEmail = document.querySelector("#email");
    let campoEmailConfirmacion = document.querySelector("#email-confirmacion");
    let campoPassword = document.querySelector("#password");
    let campoPasswordConfirmacion = document.querySelector("#password-confirmacion");
    let campoBio = document.querySelector("#bio");
    let campoLinkedin = document.querySelector("#campo-linkedin");
    let campoBehance = document.querySelector("#campo-behance");
    let campoGithub = document.querySelector("#campo-github");
    let campoWebsite = document.querySelector("#campo-website");
    let regexWebsite = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
    let regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let campoAvatar = document.querySelector("#campo-avatar");
    let campoCover = document.querySelector("#campo-cover");
    
    console.log(form.elements);
    
    window.onload = function(){
        campoBio.nextElementSibling.innerText = campoBio.value.length + "/1000";
    }
    
    document.addEventListener('change',function(){
        errorCount = 0;
        console.log(errorCount);
        
        
        for(campito of campos){
            
            if(campito.classList.contains("is-invalid")){
                errorCount = errorCount+1;
                console.log(errorCount);
            }
        }
        
        if(errorCount > 0){
            submitButton.disabled=true;
            submitButton.classList.add("btn-dark");
            submitButton.classList.remove("btn-secondary");
        }
        
        else{
            submitButton.disabled=false;
            submitButton.classList.remove("btn-dark");
            submitButton.classList.add("btn-secondary");
        }
        
        
    })
    
    
    
    campoLinkedin.addEventListener('change',function(){
        
        if(this.value == "") {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
        
        else if(this.value.indexOf("linkedin.com") == -1){
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText ="El enlace ingresado no es válido";
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
        
        else{
            this.classList.add("is-valid");  
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
    })
    
    campoBehance.addEventListener('change',function(){
        
        if(this.value == "") {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
        
        else if(this.value.indexOf("behance.net") == -1){
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText ="El enlace ingresado no es válido";
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
        
        else{
            this.classList.add("is-valid");  
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
    })
    
    
    campoGithub.addEventListener('change',function(){
        
        if(this.value == "") {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
        
        else if(this.value.indexOf("github.com") == -1){
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText ="El enlace ingresado no es válido";
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
        
        else{
            this.classList.add("is-valid");  
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
    })
    
    
    campoWebsite.addEventListener('change',function(){
        
        if(this.value == "") {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
        
        else if(!regexWebsite.test(this.value)){
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText ="El enlace ingresado no es válido";
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
        
        else{
            this.classList.add("is-valid");  
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
        }
    })
    
    
    
    
    
    
    
    
    
    
    campoBio.addEventListener('keyup',function(){
        this.nextElementSibling.innerText = this.value.length + "/1000";
        
        if(this.value.length == 1000){
            this.nextElementSibling.innerText = "¡Alcanzaste el máximo de caracteres!";
        }
    })
    
    campoAvatar.addEventListener('change',function(e){
        var output = document.getElementById('outputAvatar');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");
    })
    
    
    campoCover.addEventListener('change',function(e){
        var output = document.getElementById('outputCover');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");
    })
    
    
    campoNombre.addEventListener('change',function(e){
        if(this.value == ""){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })
    
    campoApellido.addEventListener('change',function(e){
        if(this.value == ""){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")
            
        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })
    
    campoEmail.addEventListener('change',function(e){
        
        
        if(this.value == ""){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Debés ingresar un mail";
        }
        
        
        else if(!regexMail.test(this.value)){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campoEmailConfirmacion.value){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            campoEmailConfirmacion.classList.add("is-invalid");
            campoEmailConfirmacion.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campoEmailConfirmacion.nextElementSibling.innerText = "Los emails no coinciden";
            
        }
        
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
            campoEmailConfirmacion.classList.add("is-valid");
            campoEmailConfirmacion.classList.remove("is-invalid");            
            campoEmailConfirmacion.nextElementSibling.classList.remove("is-invalid");            
            
        } 
    })
    
    
    campoEmailConfirmacion.addEventListener('change',function(e){
        
        
        if(this.value == ""){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Debés ingresar un mail";
        }
        
        
        else if(!regexMail.test(this.value)){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campoEmail.value){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            campoEmail.classList.add("is-invalid");
            campoEmail.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campoEmail.nextElementSibling.innerText = "Los emails no coinciden";
            
            
            
        }
        
        
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
            campoEmail.nextElementSibling.classList.add("d-none");
            
            campoEmail.classList.add("is-valid");
            campoEmail.classList.remove("is-invalid");            
            campoEmail.nextElementSibling.classList.remove("is-invalid");                  
        } 
    })
    
    
    
    campoPassword.addEventListener('change',function(e){
        
        
        if(this.value.length < 8){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Debe tener mínimo 8 caracteres";
        }
        
        else if(this.value != campoPasswordConfirmacion.value){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            campoPasswordConfirmacion.classList.add("is-invalid");
            campoPasswordConfirmacion.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campoPasswordConfirmacion.nextElementSibling.innerText = "Las contraseñas no coinciden";
            
        }
        
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
            campoPasswordConfirmacion.classList.add("is-valid");
            campoPasswordConfirmacion.classList.remove("is-invalid");            
            campoPasswordConfirmacion.nextElementSibling.classList.remove("is-invalid");            
            
        } 
    })
    
    
    campoPasswordConfirmacion.addEventListener('change',function(e){
        
        
        if(this.value.length < 8){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Debe tener mínimo 8 caracteres";
        }
        
        
        else if(this.value != campoPassword.value){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            campoPassword.classList.add("is-invalid");
            campoPassword.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campoPassword.nextElementSibling.innerText = "Las contraseñas no coinciden";
            
            
            
        }
        
        
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none");
            campoPassword.nextElementSibling.classList.add("d-none");
            
            campoPassword.classList.add("is-valid");
            campoPassword.classList.remove("is-invalid");            
            campoPassword.nextElementSibling.classList.remove("is-invalid");                  
        } 
    })
}


function verificarRegistro(){
    let form = document.querySelector("form");
    let campos = form.elements;
    let submit = document.querySelector("button[type=submit]");
    
    
    function crearError(campo , texto){
        //Utilizamos la funciones de booststrap para poner feo el campo
        campo.classList.add("is-invalid");
        //Creamos el campo small y se lo asignamos al lado del elemento en cuestion
        let campoError = document.createElement("small");
        campoError.classList.add("text-danger");
        campoError.setAttribute("name" , campo.name);
        campoError.innerText = texto;
        //Si ya existe el campo small no deberiamos volver a crearlo asi que le metemos su validacion
        if(!document.querySelector(`small[name=${campo.name}]`)){
            campo.insertAdjacentElement("afterend" , campoError);
        }
    }
    
    function removerError(campo){
        //Removemos las funciones 
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
        //Removemos el campo small
        campo.nextElementSibling.remove();
    }
    
    
    function validarMail (email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }
    
    
    //Campo nombre
    campos[1].addEventListener("change" , function(e){
        if(this.value == "" || this.value.length < 2){
            crearError(e.currentTarget, "Este campo debe contener al menos 2 caracteres");
        }else{
            removerError(e.currentTarget);
        }
    });
    
    //Campo apellido
    campos[2].addEventListener("change" , function(e){
        if(this.value == "" || this.value.length < 2){
            crearError(e.currentTarget, "Este campo debe contener al menos 2 caracteres");
        }else{
            removerError(e.currentTarget);
        }
    });
    
    //Campo usuario
    campos[3].addEventListener("change" , function(e){
        if(this.value == "" || this.value.length < 4){
            crearError(e.currentTarget , "Este campo debe tener al menos 4 letras");
        }else{
            removerError(e.currentTarget);
        }
    });
    
    //Campo email
    campos[4].addEventListener("change" , function(e){
        if(!validarMail(this.value)){
            crearError(e.currentTarget , "Este campo debe ser un mail valido");
        }else{
            removerError(e.currentTarget);
        }
    });
    
    //Campo confirmacion de email
    campos[5].addEventListener("change" , function(e){
        let email = document.querySelector("input[name=email]").value;
        if(email != this.value){
            crearError(e.currentTarget , "El campo debe coincidir");
        }else{
            removerError(e.currentTarget);
        }
    })
    
    //Campo contraseña
    campos[6].addEventListener("change" , function(e){
        if(this.value.length < 8 || this.value == ""){
            crearError(e.currentTarget , "Este campo no puede estar vacio y debe tener mas de 8 caracteres");
        }else{
            removerError(e.currentTarget);
        }
    })
    
    //Campo confirmar contraseña
    campos[7].addEventListener("change" , function(e){
        let password = document.querySelector("input[name=password]").value;
        if(password != this.value){
            crearError(e.currentTarget , "El campo debe coincidir");
        }else{
            removerError(e.currentTarget);
        }
    })
    
    
    campos[8].addEventListener("change" , function(e){
        if(this.value == ""){
            crearError(e.currentTarget , "El campo no puede estar vacio");
        }else{
            removerError(e.currentTarget);
        }
    })
    
    campos[9].addEventListener("change" , function(e){
        if(this.value == "0"){
            crearError(e.currentTarget , "El campo no puede estar vacio");
        }else{
            removerError(e.currentTarget);
        }
    })
    
    campos[10].addEventListener("change" , function(e){
        if(!this.checked){
            //Utilizamos la funciones de booststrap para poner feo el campo
            this.classList.add("is-invalid");
            //Creamos el campo small y se lo asignamos al lado del elemento en cuestion
            let campoError = document.createElement("small");
            campoError.classList.add("text-danger");
            campoError.setAttribute("name" , this.name);
            campoError.innerText = "Este campo debe estar seleccionado";
            //Si ya existe el campo small no deberiamos volver a crearlo asi que le metemos su validacion
            if(!document.querySelector(`small[name=${this.name}]`)){
                campoLabel = document.querySelector(".form-check-label");
                campoLabel.insertAdjacentElement("afterend" , campoError);
            }
        }else{
            let campoSmall = document.querySelector("small[name=tyc_check]");
            if(campoSmall){
                //Removemos las funciones 
                this.classList.remove("is-invalid");
                this.classList.add("is-valid")
                campoSmall.remove();
            }
        }
    })
    
    
    
    form.addEventListener('submit' , function(e){
        let mensajeFecha = "";
        let mensajeSexo = "";
        let mensajeTyc = "";

        for (const campo of campos) {
            if(campo.value == "" && campo.type != "submit"){
                console.log(campo);
                e.preventDefault();
                crearError(campo , "Todavia falta completar este campo");
            }
        }
        
        //Campo fecha nacimiento
        if(campos[8].value == ""){
            mensajeFecha = 'El campo no puede estar vacio';
        }
        
        //Campo sexo
        if(campos[9].value == "0"){
            mensajeSexo  = 'El campo no puede estar vacio';
        }
        
        if(!campos[10].checked){
            mensajeTyc ='El campo debe estar aceptado';
        }
        
        if(mensajeFecha != "" || mensajeSexo != "" || mensajeTyc != ""){
            e.preventDefault()
            if(mensajeFecha != ""){
                crearError(campos[8], mensajeFecha);
            }
            
            if(mensajeSexo != ""){
                crearError(campos[9] , mensajeSexo);
            }
            
            if(mensajeTyc != ""){
                //Utilizamos la funciones de booststrap para poner feo el campo
                campos[10].classList.add("is-invalid");
                //Creamos el campo small y se lo asignamos al lado del elemento en cuestion
                let campoError = document.createElement("small");
                campoError.classList.add("text-danger");
                campoError.setAttribute("name" , campos[10].name);
                campoError.innerText = "Este campo debe estar seleccionado";
                //Si ya existe el campo small no deberiamos volver a crearlo asi que le metemos su validacion
                if(!document.querySelector(`small[name=${campos[10].name}]`)){
                    campoLabel = document.querySelector(".form-check-label");
                    campoLabel.insertAdjacentElement("afterend" , campoError);
                }
            }
        }
    })
}