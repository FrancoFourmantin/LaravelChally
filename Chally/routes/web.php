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

 Route::view('/faq' , 'faq');
 Route::view('/perfil' , 'perfil');
 Route::get('/index-register' , 'Auth\RegisterController@mostrarRegistroConDatos');
 Route::view('/contacto' , 'contacto');

 

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



