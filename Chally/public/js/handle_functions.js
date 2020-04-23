let allLinks = document.querySelectorAll('a');
allLinks.forEach(a => a.addEventListener('click' , function(e){
    const linkActual = a.href;
    if(linkActual.search('([facebook])\w+') || linkActual.search('([google])\w+')){
        e.preventDefault();
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
    }
}));



let scroll = 0;
document.addEventListener('scroll' , function(e){
    scroll += 1;
    console.log(scroll);
    if(scroll > 100 ){
        $('#modal-registro').modal('show');
        scroll = 0;
    }
})