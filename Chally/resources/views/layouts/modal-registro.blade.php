<div id="modal-registro" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-register">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 d-none d-lg-block left" >
                    <img class="position-relative" src="{{asset('img/pencil-guy.png')}}" alt="">
                    </div>
                    
                    <div class="col-12 col-lg-5 px-5 px-lg-3 py-5 d-flex flex-column justify-content-between">
                        <div>
                            <img src="img/logo_c.svg" style="width:60px" alt="" class="text-center d-block m-auto pb-3">
                            <h4 class="color-verde mb-4 text-center">¡Registrate y armá tu portfolio creativo ahora!</h4>
                            
                            <form action="/index-register" method="GET">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputName" name="nameHero" placeholder="Tu nombre" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputMail" name="mailHero" placeholder="Tu mail" required >
                                </div>    
                                
                                <button class="btn btn-secondary w-100" type="submit">Registrarme</button>
                                
                                
                            </form>
                            
                            <ul class="mt-4">
                                <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Armá tu portfolio profesional</li>
                                <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Participá en cientos de desafíos online</li>
                                <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Creá tus propios desafíos</li>
                                <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Poné en práctica tus habilidades y hobbies</li>
                                <li class="text-muted texto-chico"><i class="fas fa-check color-verde"></i>Inspirate viendo trabajo de otras personas</li>
                            </ul>
                        </div>    
                        
                        
                        <div class="text-center w-100">
                            <hr>
                            <p class="color-verde light">¿Ya tenés cuenta?</p>
                            <a class="btn btn-outline-dark" href="/login" role="button"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 