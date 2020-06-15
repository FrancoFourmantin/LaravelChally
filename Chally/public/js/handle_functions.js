/*################# Codigo para link invalido  ############################*/ 

//Creamos una funcion findtag que nos va a servir para encontrar el link mas cercano,
//ya que algunos elementos clickeables no son A por si mismos.
const findTag = (el , att) => {
    return el.closest(`a[${att}]`);
}

//Creamos una funcion que retorne una promesa de si esta autorizado o no.
//Con un parametro link que va a ser el link que vamos a testear si esta autorizado o no
const  checkPermission = (link) => {
    return new Promise ((resolve , reject ) => {
        fetch(`${link}` , {
            method: 'GET',
            mode: 'no-cors'
          })
        .then(response => {
            return response.text();
        })
        .then(data => {
            data === '"desautorizado"' ?  resolve('desautorizado') : resolve('autorizado');
        })
        .catch(error => {
            console.log(error);
        })
    })
}


//Funcion para crear un mensaje de error
const createErrorMessage = (message) => {
    return `<small class="text-danger d-block text-center mb-3">${message}</small>`;
}

//Funcion para mostrar el modal
const showModal = () => {
    $('#modal-registro').modal('show');
}


//Event listeners
//Creamos el event listener para escuchar cualquier click
document.addEventListener('click' , (e) => {
    const link = findTag(e.target , 'href');
    e.preventDefault();
    if(link){
         checkPermission(link.href)
        .then(data => {
            if(data == 'desautorizado'){
                e.preventDefault();
                showModal();
                document.getElementById('modal-registro')
                        .querySelector('#modal__title')
                        .insertAdjacentHTML('beforebegin' , createErrorMessage('Ups, parece que tenes que estar registrado para acceder a este link'));
            }else{
                window.location.href = link.href;
            }
        });
    }
});


/*Codigo para interval*/
const setCookie = () => {
    const inFiveMinutes = new Date(new Date().getTime() + 5 * 60 * 1000);
    if(!Cookies.get('register')){
        Cookies.set('register' , true , {expires: inFiveMinutes});
    }
}

const checkCookie = () => {
    if(!Cookies.get('register')){
        showModal();
        setCookie();
    };
    setTimeout(checkCookie , 30000);
};

setCookie();
checkCookie();





