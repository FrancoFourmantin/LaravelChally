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

Route::get('/', function () {
    return view('index');
});


/**
 * 
 * Rutas de index
 */

 Route::view('/faq' , 'faq'); //Rua para faq
 Route::view('/perfil' , 'perfil'); //Ruta simple para perfil
 Route::get('/index-register' , 'Auth\RegisterController@mostrarRegistroConDatos'); //Ruta para enviar al usuariao a regiser despues de llenar el formulario de index
 Route::view('/contacto' , 'contacto'); //Ruta para contacto
 Route::get('/home/feed' , 'HomeController@index');  //Ruta para enviar al usuario al feed despues del login
 Route::get('/editar-perfil' , 'UsuarioController@edit'); //Ruta para mostrar datos a editar del usuario
 Route::post('/editar-perfil', 'UsuarioController@updateValidator'); //Ruta para verificar y guardar actualizacion de perfil

 

/**
 * 
 *  Rutas de Registro
 * 
 */


/**
 * 
 * Rutas de Login
 * 
 */

 /**
 * 
 * Rutas de Posteos
 * 
 */

 
  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



