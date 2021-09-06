<?php

use App\PrologExecuter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//require_once(   dirname(__FILE__).'/../vendor/php-clips/php/clips.php' );


/* RUTAS PARA INGRESO Y REGISTRO DE USUARIO Y CLIENTE */


Route::get('/', 'UserController@home')->name('user.home');

Route::get('/login', 'UserController@verLogin')->name('user.verLogin'); //para desplegar la vista del Login
Route::post('/ingresar', 'UserController@logearse')->name('user.logearse'); //post

Route::get('/cerrarSesion','UserController@cerrarSesion')->name('user.cerrarSesion');


Route::get('/probandoCosas',function(){
	
	//ejecutamos el co mando
	$exec = new PrologExecuter();
	return "el output es:".$exec->ejecutarComando("calcularNivelPrestamo(40000).");
	

 

});

Route::get('/Prestamos/VerEvaluar','PrestamoController@VerEvaluar')->name('Prestamos.VerEvaluar');

//invocable desde JS, Retorna un modal
Route::get('/Prestamos/EvaluarPrestamo/','PrestamoController@Evaluar')->name('Prestamos.Evaluar');


Route::post('/Prestamos/CrearPrestamo/','PrestamoController@CrearPrestamo')->name('Prestamos.Crear');

Route::get('/consultarDNI/{dni}','PrestamoController@ConsultarAPISunatDNI');

//PERSONA
Route::get('/Persona/listar', 'PersonaController@listar')->name('Persona.listar');
Route::get('/Persona/crear', 'PersonaController@crear')->name('Persona.crear');
Route::post('/Persona/guardar', 'PersonaController@guardar')->name('Persona.guardar');
Route::get('/Persona/{id}/editar', 'PersonaController@editar')->name('Persona.editar');
Route::post('/Persona/update', 'PersonaController@update')->name('Persona.update');
Route::get('/Persona/{id}/eliminar', 'PersonaController@eliminar')->name('Persona.eliminar');