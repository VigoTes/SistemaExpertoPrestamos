<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/* RUTAS PARA INGRESO Y REGISTRO DE USUARIO Y CLIENTE */


Route::get('/', 'UserController@home')->name('user.home');

Route::get('/login', 'UserController@verLogin')->name('user.verLogin'); //para desplegar la vista del Login
Route::post('/ingresar', 'UserController@logearse')->name('user.logearse'); //post

Route::get('/cerrarSesion','UserController@cerrarSesion')->name('user.cerrarSesion');


Route::get('/probandoCosas',function(){

    clips_clear();
	/* clips_set_strategy(LEX_STRATEGY);
	clips_load("rules.clp");
	clips_reset();
	
	clips_assert(array("hunter", "brian", "duck"));
	
	clips_run();
	
	$facts = clips_get_fact_list();
	
	print_r($facts); */

});