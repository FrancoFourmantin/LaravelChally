// Funciones de Validación a implementar
function getFields(form){
    return Array.from(form.querySelectorAll(".form-control , .form-check-input"));
}

function checkEmpty(field){
    return field.value.length == 0 || field.value=="" ? `El campo ${field.dataset.name} no puede estar vacío` : false; 
}

function checkLength(field,min,max){
    return field.value.length < min || field.value.length > max ? `El campo ${field.dataset.name} debe tener entre ${field.dataset.min} y ${field.dataset.max} caracteres` : false;
}

function checkMail(field){
    let regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return !regexMail.test(field.value) ? `El mail que ingresaste no es válido` : false;
}

function checkConfirmation(field,brother){
    let brotherField = document.querySelector(`input[name=${brother}]`);
    if(field.value != brotherField.value){
        let error = "Los campos ingresados no coinciden";
        showError(brotherField,error);      
    }
}

function checkAjax(field){
    fetch(`/${field.dataset.ajax}/${field.value}`)
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        data == false ? showError(field,`El ${field.dataset.name} ya se encuentra registrado.`) : hideError(field);
    })
    .catch(function(error){
        "Hubo un error";
    })

}

function checkCheckbox(field){
    return !field.checked ? `Marcar la casilla de ${field.dataset.name} es obligatorio` : false;
}

function checkDate(field){
    let startDate = new Date("01/01/1900");
    let limitDate = new Date("01/01/2008");
    let todayDate = new Date();
    let userDate = new Date(field.value);
    if(userDate > todayDate){
        return `La fecha ingresada no es válida`;
    }
    else if(userDate > limitDate || userDate < startDate){
        return `Debes ser mayor de 12 años para usar Chally`;
    }
        return false;
}


// Funciones de Interacción
function showError(field,error){
    hideError(field);
    field.insertAdjacentHTML("afterend",`<small class="text-danger animated fadeIn">${error}</small>`);
    field.classList.add("is-invalid");
    field.classList.remove("is-valid");
}

function hideError(field){
    if(field.nextElementSibling){
        field.nextElementSibling.remove();
        field.classList.remove("is-invalid");
        field.classList.add("is-valid");
    }
}


// Inicialización de Validaciones
let form = document.querySelector("form.needs-validation");
let fields = getFields(form);
console.log(fields);
let submitButton = form.querySelector("button[type=submit]");
fields.forEach(field => field.addEventListener('change',runValidation)); 

function runValidation(e, caller = 0){
    /* El parámetro caller lo utilizo para saber quién llamó la función así seteo correctamente el nombre del Field.
    Si fue llamado por la callback, el caller es 0. 
    Si fue llamado por el primero chequeo de registro de red social,  el caller es distinto de cero.  
    */
    caller == 0 ? field = e.currentTarget : field=e;

    // Validación para strings estándar
    if(field.dataset.type == "string"){
        if(checkEmpty(field)){
            showError(field,checkEmpty(field));
        }
        else if (checkLength(field,field.dataset.min,field.dataset.max)){
            showError(field,checkLength(field,field.dataset.min,field.dataset.max));
        }
        else if(field.hasAttribute("data-ajax")){
            checkAjax(field);
        }
        else{
            if(field.hasAttribute("data-brother")){
                checkConfirmation(field,field.dataset.brother);
            }
            hideError(field);
        }
    }

    // Validación para emails
    if(field.dataset.type == "email"){
        if(checkEmpty(field)){
            showError(field,checkEmpty(field));
        }
        else if (checkLength(field,field.dataset.min,field.dataset.max)){
            showError(field,checkLength(field,field.dataset.min,field.dataset.max));
        }

        else if(checkMail(field)){
            showError(field,checkMail(field));
        }

        else if(field.hasAttribute("data-ajax")){
            checkAjax(field);
        }

        else{
            if(field.hasAttribute("data-brother")){
                checkConfirmation(field,field.dataset.brother);
            }
            hideError(field);
        }
    }

    // Validación para selects
    if(field.dataset.type == "select"){
        if(checkEmpty(field)){
            showError(field,checkEmpty(field));
        }        
        else{
            hideError(field);
        }
    }

    // Validación para checkboxes
    if(field.dataset.type == "checkbox"){
        if(checkCheckbox(field)){
            showError(field,checkCheckbox(field));
        }        
        else{
            hideError(field);
        }
    }

    if(field.dataset.type == "date"){
        if(checkEmpty(field)){
            showError(field,checkEmpty(field));
        }        
        else if(checkDate(field)){
            showError(field,checkDate(field));
        }        
        else{
            hideError(field);
        }    
    }

    let result = fields.every(field => field.classList.contains("is-valid"));
    result ? submitButton.removeAttribute('disabled') : submitButton.setAttribute('disabled','');
}
