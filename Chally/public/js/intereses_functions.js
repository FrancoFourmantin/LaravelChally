let contador = 0;
let form = document.querySelector('#form-intereses');
let checkboxs = form.querySelectorAll('.switch-checkbox');
let smallError = document.createElement('small');
let modal = document.getElementById('seleccionar-intereses');
smallError.classList.add('text-danger' , 'mr-auto');


checkboxs.forEach(function(checkbox){
    checkbox.checked ? contador += 1 : contador;
})
//Simple listener que me sirve para contar cuantos checkbox estan "chequeados"
checkboxs.forEach(checkbox => checkbox.addEventListener('change' , function(e){
    e.currentTarget.checked ? contador += 1 : contador -= 1;
    console.log(contador);
}))


//Con este fetch es que vamos a mostrar el modal con la respuesta de una API que nos dice si respondio o no a los intereses
fetch('/api/usuario/intereses')
.then(function(response){
    return response.json();
})
.then(function(data){
    console.log(data);
    if(data === false){
        //Funciones de bootstrap para manejar los modals
        $('#seleccionar-intereses').modal({
            backdrop: 'static', //Para que no lo puedan cerrar
            keyboard: false
        })
        $('#seleccionar-intereses').modal('show');

        form.addEventListener('submit' , function(e){
            if(contador < 3){
                smallError.innerText = "* Debe seleccionar al menos 3 categorias";
                modal.querySelector('.modal-footer').insertAdjacentElement('afterbegin' , smallError);
                e.preventDefault();
            }else{
                $('#seleccionar-intereses').modal({
                    backdrop: 'true',
                    keyboard: true
                })
            }

        })


    }
})
.catch(function(error){
    console.log(error); 
})