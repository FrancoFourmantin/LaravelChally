let allLinks = document.querySelectorAll('a');
allLinks.forEach(a => a.addEventListener('click' , function(e){
    e.preventDefault();
    let linkActual = a.href;
    fetch(linkActual)
    .then(function(response){
        return response.text();
    })
    .then(function(data){
        if(data === '"desautorizado"'){
            $('#modal-registro').modal('show');
        }else{
            window.location.href = linkActual;
        }
    })
    .then(function(error){
        console.log(error);
    })
}));