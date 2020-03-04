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
    return view('welcome');
});

Route::get('/hola-mundo', function() {
	return "Hola mundo!! Soy Sergio Cabedo";
});

//CON PARAMETRO, SE PASA A LA FUNCION Y LUEGO A LA VISTA CON UN ARRAY 
/*Route::get('contacto/ {nombre}', function($nombre) {
	return view('contacto', array(
		'nombre' => $nombre 
	));
});*/

//CON PARAMETRO, SE PASA A LA FUNCION Y LUEGO A LA VISTA CON UN ARRAY (OPCIONAL)
Route::get('contacto/{nombre?}/{edad?}', function($nombre = "Sergio Cabedo", $edad = 45) {
	/*return view('contacto', array(
		'nombre' => $nombre,
		'edad'=> $edad
	));*/

	return view ('contacto') 
	 			->with('nombre',$nombre)
				->with('edad',$edad);
})-> where([
	'nombre' => '[A-Za-z]+',
	'edad'=> '[0-9]+'
]);

Route::post('/hola-mundo', function() {
	return "Hola mundo!! Soy Sergio Cabedo";
});

//MATCH SIRVE PARA VARIOS METODOS
Route::match(['get','post'],'/hola-mundo1', function() {
	return "Hola mundo!! Soy Sergio Cabedo1";
});

// ANY PARA CUALQUIER METODO HTTP 
Route::any('/hola-mundo2', function() {
	return "Hola mundo!! Soy Sergio Cabedo2";
});