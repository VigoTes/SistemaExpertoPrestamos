<?php

use App\PrologExecuter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//require_once(   dirname(__FILE__).'/../vendor/php-clips/php/clips.php' );
	



	Route::get('/login', 'UserController@verLogin')->name('user.verLogin'); //para desplegar la vista del Login
	Route::post('/ingresar', 'UserController@logearse')->name('user.logearse'); //post

	Route::get('/probandoCosas',function(){
		
		//ejecutamos el co mando
		$exec = new PrologExecuter();
		return "el output es:".$exec->ejecutarComando("calcularNivelPrestamo(40000).");

	});


Route::group(['middleware'=>"ValidarSesion"],function()
{

	/* RUTAS PARA INGRESO Y REGISTRO DE USUARIO Y CLIENTE */


	Route::get('/', 'UserController@home')->name('user.home');

	
	Route::get('/cerrarSesion','UserController@cerrarSesion')->name('user.cerrarSesion');




	Route::get('/Prestamos/Listar','PrestamoController@listarPrestamos')->name('Prestamos.Listar');
	Route::get('/Prestamos/VerEvaluar','PrestamoController@VerEvaluar')->name('Prestamos.VerEvaluar');

	Route::get('/Prestamos/VerPrestamo/{codPrestamo}','PrestamoController@VerPrestamo')->name('Prestamos.VerPrestamo');

	//invocable desde JS, Retorna un modal
	Route::get('/Prestamos/EvaluarPrestamo/','PrestamoController@Evaluar')->name('Prestamos.Evaluar');


	Route::post('/Prestamos/CrearPrestamo/','PrestamoController@CrearPrestamo')->name('Prestamos.Crear');

	Route::get('/consultarDNI/{dni}','PrestamoController@ConsultarAPISunatDNI');

	//USUARIO
	Route::get('/Usuario/listar', 'UsuarioController@listar')->name('Usuario.listar');
	Route::get('/Usuario/crear', 'UsuarioController@crear')->name('Usuario.crear');
	Route::post('/Usuario/guardar', 'UsuarioController@guardar')->name('Usuario.guardar');
	Route::get('/Usuario/{id}/editar', 'UsuarioController@editar')->name('Usuario.editar');
	Route::post('/Usuario/update', 'UsuarioController@update')->name('Usuario.update');
	Route::get('/Usuario/{id}/eliminar', 'UsuarioController@eliminar')->name('Usuario.eliminar');

	//PERSONA
	Route::get('/Persona/listar', 'PersonaController@listar')->name('Persona.listar');
	Route::get('/Persona/crear', 'PersonaController@crear')->name('Persona.crear');
	Route::post('/Persona/guardar', 'PersonaController@guardar')->name('Persona.guardar');
	Route::get('/Persona/{id}/editar', 'PersonaController@editar')->name('Persona.editar');
	Route::post('/Persona/update', 'PersonaController@update')->name('Persona.update');
	Route::get('/Persona/{id}/eliminar', 'PersonaController@eliminar')->name('Persona.eliminar');

	//TASA DE INTERES
	Route::get('/TasaInteres/listar', 'TasaInteresController@listar')->name('TasaInteres.listar');
	Route::get('/TasaInteres/crear', 'TasaInteresController@crear')->name('TasaInteres.crear');
	Route::post('/TasaInteres/guardar', 'TasaInteresController@guardar')->name('TasaInteres.guardar');
	Route::get('/TasaInteres/{id}/editar', 'TasaInteresController@editar')->name('TasaInteres.editar');
	Route::post('/TasaInteres/update', 'TasaInteresController@update')->name('TasaInteres.update');
	//Route::get('/TasaInteres/{id}/eliminar', 'TasaInteresController@eliminar')->name('TasaInteres.eliminar');

	//PLAZO DE PAGO
	Route::get('/PlazoPago/listar', 'PlazoPagoController@listar')->name('PlazoPago.listar');
	Route::get('/PlazoPago/crear', 'PlazoPagoController@crear')->name('PlazoPago.crear');
	Route::post('/PlazoPago/guardar', 'PlazoPagoController@guardar')->name('PlazoPago.guardar');
	Route::get('/PlazoPago/{id}/editar', 'PlazoPagoController@editar')->name('PlazoPago.editar');
	Route::post('/PlazoPago/update', 'PlazoPagoController@update')->name('PlazoPago.update');
	Route::get('/PlazoPago/{id}/eliminar', 'PlazoPagoController@eliminar')->name('PlazoPago.eliminar');




	// RAZON PRESTAMO CRUD 


	Route::get('/RazonPrestamo/listar','RazonPrestamoController@listar')->name('RazonPrestamo.listar');
	Route::get('/RazonPrestamo/eliminar/{codRazon}','RazonPrestamoController@eliminar')->name('RazonPrestamo.eliminar');
	Route::post('/RazonPrestamo/agregarEditar','RazonPrestamoController@agregarEditarRazonPrestamo')->name('RazonPrestamo.agregarEditar');



	Route::get('/yara/{cod}',function($dato){
		return "hola si".$dato;
		

	});





});