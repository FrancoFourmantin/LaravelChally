function validarDesafio(){
    let form = document.querySelector("#nuevoDesafio");
    let campos = form.elements;
    let step2 = document.querySelector("#step-2");
    let submitButton= document.querySelector("button[type='submit']");
    let errorCount = 0;
    
    /* Si vuelvo por un post fallido, mostrar la sección 2 */
    for(campito of campos){
        if(campito.classList.contains("is-invalid")){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
    }

    /* Traigo por ajax las subcategorías cuando estamos en edición */
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

    function ajaxSubCat(){
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

    /* TITULO DEL DESAFÍO */
    campos["inputName"].addEventListener('change',function(e){

        if (checkEmpty(this)){
            showError(this);
        }

        else if(checkLength(this,10)){
            showError(this);
        }

        else{
            hideError(this);
        }
    })
    
    /* CATEGORÍA */
    campos["categoria"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        else{
            hideError(this);
            ajaxSubCat();
        }
    })
    
    /* SUBCATEGORÍA */
    campos["subcategoria"].addEventListener('change',function(e){
            if(checkEmpty(this)){
                showError(this);
            }

            else{
                hideError(this);
            }
    })
    
    /* FOTO */
    campos["inputGroupFile01"].addEventListener('change',function(e){
        showImageBeforeUpload('output',e)
    })
    
    /* REQUISITOS */
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

    document.addEventListener('change',function(e){

        /* ACTIVACION DE STEP 2 */
        if ( checkValid(campos[1]) && checkValid(campos[2]) && checkValid(campos[3]) && output.src ){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }

        countErrors(campos,campos['submit-desafio']);
        
        /* ARMADO DE REQUISITOS */
        campos["requisitos"].value="";
        camposDeRequisitos.forEach(function(requisito){
            if(requisito.value != ""){
                campos["requisitos"].value= campos["requisitos"].value + "<li>" + requisito.value + "</li>";
            }
            
        })

    })
    
    /* DESCRIPCION */
    campos["descripcion"].addEventListener('change',function(e){

        if(checkEmpty(this)){
            showError(this);
        }

        else if(checkLength(this,30)){
            showError(this);
        }

        else{
            hideError(this);
        }
            
    })
    
    /* DIFICULTAD */
    campos["dificultad"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }

        else{
            hideError(this);
        }
    })

    /* FECHA LIMITE */
    campos["fechaLimite"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }

        else{
            hideError(this);
        }
    })

}



function validarPerfil(){

    let form = document.querySelector("#edicion-perfil");
    let campos = form.elements;

    let modificadorPassword = document.querySelector(".modificar-datos-personales");
    let botonModificadorPassword = document.querySelector("#boton-modificar-password");

    botonModificadorPassword.addEventListener("click",function(){
        modificadorPassword.classList.remove("d-none","opacity-0");
        this.classList.add("d-none");
    })
    
    let submitButton = document.querySelector("button[type='submit']");
    let regexWebsite = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
    let regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        
    /* Setear max length de bio */
    window.onload = function(){
        campos["bio"].nextElementSibling.innerText = campos["bio"].value.length + "/500";
    }
    
    /* Verificación persistente de errores */
    document.addEventListener('change',function(){
        countErrors(campos,campos['submit-perfil']);
    })

    campos["bio"].addEventListener('keyup',function(){
        this.nextElementSibling.innerText = this.value.length + "/500";
        
        if(checkEmpty(this)){
            showDefault(this);
        }

        else if(this.value.length == 500){
            this.nextElementSibling.innerText = "¡Alcanzaste el máximo de caracteres!";
        }
    })

    campos["campo-linkedin"].addEventListener('change',function(){
        if(checkEmpty(this)){
            showDefault(this);
        }
        else{
            checkURL(this,/[^a-zA-Z0-9@-]|(linkedin.com\/in\/)|(https:\/\/)|(http:\/\/)|(www)|(com)|(linkedin.com\/in\/)/g);
        }
    });

    campos["campo-behance"].addEventListener('change',function(){
        if(checkEmpty(this)){
            showDefault(this);
        }
        else{
        checkURL(this,/[^a-zA-Z0-9@-]|(behance.net)|(https:\/\/)|(http:\/\/)|(www)/g);
        }
    });
    
    campos["campo-github"].addEventListener('change',function(){
        if(checkEmpty(this)){
            showDefault(this);
        }
        else{
        checkURL(this,/[^a-zA-Z0-9@-]|(github.com)|(https:\/\/)|(http:\/\/)|(www)/g);
        }
    });

    campos["campo-website"].addEventListener('change',function(){
        
        if(checkEmpty(this)){
            showDefault(this);
        }
        
        else if(!regexWebsite.test(this.value)){
            showError(this);
            this.nextElementSibling.innerText ="El enlace ingresado no es válido";
        }
        
        else{
            hideError(this);
        }
    })

    /* Muestra el avatar en vivo */
    campos["campo-avatar"].addEventListener('change',function(e){
        showImageBeforeUpload('outputAvatar',e);
    })
    
    /* Muestra la portada en vivo */
    campos["campo-cover"].addEventListener('change',function(e){
        showImageBeforeUpload('outputCover',e);
    })
    
    /* Validacion Nombre */
    campos["nombre"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }

        else if(checkLength(this,3)){
            showError(this);
        }
            
        else{
            hideError(this);
        }
    })
    
    /* Validacion Apellido */
    campos["apellido"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }

        else if(checkLength(this,3)){
            showError(this);
        }
            
        else{
            hideError(this);
        }
    })
    
    /* Validacion Campo Email */
    campos["email"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        
        else if(!regexMail.test(this.value)){
            showError(this);
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campos["email-confirmacion"].value){
            showError(this);
            showError(campos["email-confirmacion"]);
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campos["email-confirmacion"].nextElementSibling.innerText = "Los emails no coinciden";
            
        }
        
        else{
            hideError(this);
            hideError(campos["email-confirmacion"]); 
        } 
    })
    
    /* Validacion Campo Confirmacion EMail */
    campos["email-confirmacion"].addEventListener('change',function(e){
        
        if(checkEmpty(this)){
            showError(this);
        }
        
        else if(!regexMail.test(this.value)){
            showError(this);
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campos["email"].value){
            showError(this);
            showError(campos["email"]);
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campos["email"].nextElementSibling.innerText = "Los emails no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["email"]);                   
        } 
    })
    
    /* Validacion Campo Password */    
    campos["password"].addEventListener('change',function(e){
        
        if(checkEmpty(this)){
            showDefault(this);
            showDefault(campos["password-confirmacion"]);
            campos["password-confirmacion"].value="";
        }

        else if(checkLength(this,8)){
            showError(this);
        }
        
        else if(this.value != campos["password-confirmacion"].value){
            showError(this);
            showError(campos["password-confirmacion"]);
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campos["password-confirmacion"].nextElementSibling.innerText = "Las contraseñas no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["password-confirmacion"]);
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");      
        } 
    })
    
    campos["password-confirmacion"].addEventListener('change',function(e){
        
        if(checkEmpty(this)){
            showDefault(this);
            showDefault(campos["password"]);
            campos["password"].value="";
        }

        else if(checkLength(this,8)){
            showError(this);
        }

        else if(this.value != campos["password"].value){
            showError(this);
            showError(campos["password"]);
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campos["password"].nextElementSibling.innerText = "Las contraseñas no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["password"]);
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");      
        } 
    })
}


function validarRegistro(){
    let form = document.querySelector("form");
    let campos = form.elements;
    let submit = document.querySelector("button[type=submit]");
    let regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    /* Errores en vivo */
    document.addEventListener('change',function(){
        countErrors(campos,campos['submit-register']);
    })


    //Campo nombre
    campos["nombre"].addEventListener("change" , function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        else if(checkLength(this,3)){
            showError(this);
        }
        else{
            hideError(this);
        }
    });
    
    //Campo apellido
    campos["apellido"].addEventListener("change" , function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        else if(checkLength(this,3)){
            showError(this);
        }
        else{
            hideError(this);
        }
    });
    
    //Campo username
    campos["username"].addEventListener("change" , function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        else if(checkLength(this,4)){
            showError(this);
        }
        else{
            hideError(this);
        }
    });
    

    /* Validacion Campo Email */
    campos["email"].addEventListener('change',function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        
        else if(!regexMail.test(this.value)){
            showError(this);
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campos["email-confirmacion"].value){
            showError(this);
            showError(campos["email-confirmacion"]);
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campos["email-confirmacion"].nextElementSibling.innerText = "Los emails no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["email-confirmacion"]); 
        } 
    })
    
    /* Validacion Campo Confirmacion EMail */
    campos["email-confirmacion"].addEventListener('change',function(e){
        
        if(checkEmpty(this)){
            showError(this);
        }
        
        else if(!regexMail.test(this.value)){
            showError(this);
            this.nextElementSibling.innerText = "El email ingresado no es válido";
        }
        
        else if(this.value != campos["email"].value){
            showError(this);
            showError(campos["email"]);
            this.nextElementSibling.innerText = "Los emails no coinciden";
            campos["email"].nextElementSibling.innerText = "Los emails no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["email"]);                   
        } 
    })
    
    /* Validacion Campo Password */    
    campos["password"].addEventListener('change',function(e){
            
        if(checkEmpty(this)){
            showDefault(this);
            showDefault(campos["password-confirmacion"]);
            campos["password-confirmacion"].value="";
        }

        else if(checkLength(this,8)){
            showError(this);
        }
        
        else if(this.value != campos["password-confirmacion"].value){
            showError(this);
            showError(campos["password-confirmacion"]);
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campos["password-confirmacion"].nextElementSibling.innerText = "Las contraseñas no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["password-confirmacion"]);
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");      
        } 
    })

    campos["password-confirmacion"].addEventListener('change',function(e){
        
        if(checkEmpty(this)){
            showDefault(this);
            showDefault(campos["password"]);
            campos["password"].value="";
        }

        else if(checkLength(this,8)){
            showError(this);
        }

        else if(this.value != campos["password"].value){
            showError(this);
            showError(campos["password"]);
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.innerText = "Las contraseñas no coinciden";
            campos["password"].nextElementSibling.innerText = "Las contraseñas no coinciden";
        }
        
        else{
            hideError(this);
            hideError(campos["password"]);
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");      
        } 
    })

    //Campo fecha
    campos["fecha"].addEventListener("change" , function(e){
        if(checkEmpty(this)){
            showError(this);
        }

        else{
            hideError(this);
        }
    });

    //Campo sexo
    campos["sexo"].addEventListener("change" , function(e){
        if(checkEmpty(this)){
            showError(this);
        }
        else{
            hideError(this);
        }
    });
    
    campos["tyc_check"].addEventListener("change",function(e){
        if(checkChecked(this)){
            hideError(this);
        }
        else{
            showError(this);
        }
    })

}