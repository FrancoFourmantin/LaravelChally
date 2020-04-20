function checkEmpty(campo){
    if (campo.value.trim() == "" || campo.value == "0"){
        campo.nextElementSibling.innerHTML=`El campo ${campo.getAttribute("inputname")} no puede estar vacío`;
        return "Error";
    }
}

function checkLength(campo,numero){
    if(campo.value.length < numero){
        campo.nextElementSibling.innerHTML=`El campo ${campo.getAttribute("inputname")} debe tener mínimo ${numero} caracteres`;
        return "Error";
    }
}

function checkURL(campo,regex){
    campo.value= campo.value.replace(regex,'');
}

function checkChecked(campo){
    campo.nextElementSibling.innerHTML=`El campo ${campo.getAttribute("inputname")} debe ser aceptado`;
    return campo.checked;
}

/* Hace validación de errores en vivo */
function countErrors(campos,submitButton){
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
}

function showImageBeforeUpload(imagen,e){
    let output = document.getElementById(imagen);
    output.src = URL.createObjectURL(e.target.files[0]);
    output.classList.add("opacity-1");
}

function checkValid(campo){
    return campo.classList.contains("is-valid");
}


function showError(campo){
    campo.classList.add("is-invalid");
    campo.nextElementSibling.classList.remove("d-none");
}

function showDefault(campo){
    campo.classList.remove("is-invalid");
    campo.classList.remove("is-valid");
    campo.nextElementSibling.classList.add("d-none");
}

function hideError(campo){
    campo.classList.add("is-valid");
    campo.classList.remove("is-invalid");
    campo.nextElementSibling.classList.add("d-none")
}


function mostrarModal(){
    
    window.addEventListener('click', function(e){
        let element = e.currentTarget;
        if(element.href){
            console.log(element.href);
        }
    })
}