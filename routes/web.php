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
	return "el output es:".$exec->ejecutarComando("test");
	

 

});

Route::get('/Prestamos/VerEvaluar','PrestamoController@VerEvaluar')->name('Prestamos.VerEvaluar');


