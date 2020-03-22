
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