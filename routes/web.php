<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    return view('welcome');
});

//USUARIOS
Route::get('login/{email}/{contra}', ['uses' => 'UsuarioController@login']);
Route::get('registro/{nombre}/{telefono}/{email}/{contra}/{sexo}/{tipoDiab}/{fechaNac}', ['uses' => 'UsuarioController@registrar']);
Route::get('mostrarU/{idUsuario}', ['uses' => 'UsuarioController@mostrarU']);

//GLUCOSA
Route::get('agregarG/{glucosa}/{hora}/{fecha}/{periodo}/{actividad}/{medicacion}/{recordatorio}/{nota}/{idUsuario}', ['uses' => 'GlucosaController@agregarG']);
Route::get('ultimaGlucosa/{idUsuario}', ['uses' => 'GlucosaController@ultimaGlucosa']);
Route::get('promedioGlucosa/{idUsuario}', ['uses' => 'GlucosaController@glucosaPromedio']);
Route::get('glucosaAvgUlt/{idUsuario}', ['uses' => 'GlucosaController@glucosaAvgUlt']);
Route::get('mostrarG/{idUsuario}', ['uses' => 'GlucosaController@mostrarG']);

//PESO
Route::get('agregarP/{peso}/{hora}/{fecha}/{notas}/{idUsuario}',['uses'=> 'PesoController@agregarP']);
Route::get('mostrarP/{idUsuario}',['uses'=> 'PesoController@mostrarP']);
Route::get('mostrarPEst/{idUsuario}',['uses'=> 'PesoController@mostrarPEst']);

//PRESION ARTERIAL
Route::get('agregarPA/{sistolica}/{diastolica}/{pulso}/{fecha}/{hora}/{recordatorio}/{nota}/{idUsuario}',['uses'=> 'PresionArterialController@agregarPA']);
Route::get('mostrarPA/{idUsuario}', ['uses' => 'PresionArterialController@mostrarPA']);

//MEDICAMENTO
Route::get('agregarM/{dosis}/{descripcion}/{hora}/{fecha}/{recordatorio}/{notas}/{idUsuario}',['uses'=> 'MedicamentoController@agregarM']);
Route::get('mostrarM/{idUsuario}', ['uses' => 'MedicamentoController@mostrarM']);


//PRUEBAS
Route::get('fecha/{idUsuario}', ['uses' => 'MedicamentoController@fecha']);


