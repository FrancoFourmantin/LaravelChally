<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/***
* Rutas publicas
* 
* 
*/
Route::get('/', 'HomeController@index')->middleware("guest");
Route::get('/feed', 'DesafioController@index');  //Ruta para enviar al usuario al feed despues del login
Route::get('/feed/categoria-{id}', 'DesafioController@indexCategoria');  //Ruta para enviar al usuario al feed despues del login
Route::get('/usuario/{username}', 'UsuarioController@show'); //Ruta para mostrar usuario;
Route::get('/desafio/ver/{id}', 'DesafioController@show');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

/**
* 
* Rutas de index
*/
Route::view('/faq', 'faq'); //Rua para faq
Route::get('/index-register', 'Auth\RegisterController@mostrarRegistroConDatos'); //Ruta para enviar al usuariao a regiser despues de llenar el formulario de index
Route::view('/contacto', 'contacto'); //Ruta para contacto

/**
 * Rutas de likes
 * 
 */
Route::get('/likes/get/{id_desafio}/{es_desafio}' , 'likeController@show');

/**
 * 
 * Rutas de api
 */
Route::get('/api/resultados/{busqueda}' , 'BuscadorController@apiResultados');


Route::post('/intereses/modificar' , 'UsuarioCategoriaController@update');

Route::view('/resultados-busqueda' , 'resultados-busqueda');


/**
* 
* Rutas para usuarios logeados
*/
Route::group(['middleware' => 'auth'], function () {

    /* Rutas de Bookmarks */
    Route::get('/usuario/{username}/bookmarks' , 'BookmarkController@show');
    Route::post('/bookmarks/procesar/' , 'BookmarkController@procesar');
    Route::get('/bookmarks/get/{id_desafio}' , 'bookmarkController@fetch');
    Route::get('/getuserbookmarks/{id_usuario}','BookmarkController@getUserBookmarks');
    /**
    * 
    * Rutas de usuarios
    */
    Route::get('/editar-perfil', 'UsuarioController@edit'); //Ruta para mostrar datos a editar del usuario
    Route::post('/editar-perfil/modificar', 'UsuarioController@update'); //Ruta para verificar y guardar actualizacion de perfil
    Route::get('/usuario/agregar/{username}', 'AmistadController@store'); //Ruta para enviar solicitud de amistad
    Route::get('/usuario/{username}/solicitudes' , 'AmistadController@edit'); //Ruta para mostrar solicitudes de amistadd
    Route::get('/usuario/{estado}/{username}' , 'AmistadController@update'); //Ruta para aceptar o rechazar 
    Route::get("/usuario/{username}/amigos/", "AmistadController@show");
    Route::get("/api/usuario/intereses" , "UsuarioCategoriaController@cookieApi");//Ruta para devolver cookie

    /**
    * 
    * Rutas de Posteos */
    Route::get('/desafio/crear', 'DesafioController@create');
    Route::post('/desafio/crear', 'DesafioController@store');   
    Route::get('/desafio/editar/{id}', 'DesafioController@edit');
    Route::post('/desafio/editar/{id}', 'DesafioController@update');
    Route::get('/desafio/borrar/{id}', 'DesafioController@destroy');
    
    
    
    
    
    Route::get('categoriasApi',function(){
        $listadoCategorias= \App\Categoria::all();
        return $listadoCategorias;
    });
    
    /* Rutas de Respuestas */
    
    Route::get('desafio/ver/{idDesafio}/respuesta/crear', 'RespuestaController@create');
    Route::post('desafio/ver/{idDesafio}/respuesta/crear', 'RespuestaController@store');
    Route::get('/respuesta/editar/{id}', 'RespuestaController@edit');
    Route::post('/respuesta/editar/{id}', 'RespuestaController@update');
    Route::get('/respuesta/borrar/{id}', 'RespuestaController@destroy');
    
    /**
    * 
    * Rutas de like
    */
    
    Route::post('/likes/new' , "likeController@store");

    
    /**
    * Rutas de categoria
    * 
    */
    
    Route::get("/categorias" , "CategoriaController@create")->middleware("role");
    Route::post("/agregarCategoria" , "CategoriaController@store")->middleware("role");
});

Auth::routes();
