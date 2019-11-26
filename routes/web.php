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
Route::get('perfil/{idUsuario}', ['uses' => 'UsuarioController@perfil']);
Route::get('desactivar/{email}', ['uses' => 'UsuarioController@desactivarCuenta']);
Route::get('updateU/{nombre}/{telefono}/{estatura}/{idUsuario}', ['uses' => 'UsuarioController@updateU']);


//GLUCOSA
Route::get('agregarG/{glucosa}/{hora}/{fecha}/{periodo}/{actividad}/{medicacion}/{recordatorio}/{nota}/{idUsuario}', ['uses' => 'GlucosaController@agregarG']);
Route::get('ultimaGlucosa/{idUsuario}', ['uses' => 'GlucosaController@ultimaGlucosa']);
Route::get('promedioGlucosa/{idUsuario}', ['uses' => 'GlucosaController@glucosaPromedio']);
Route::get('glucosaAvgUlt/{idUsuario}', ['uses' => 'GlucosaController@glucosaAvgUlt']);
Route::get('mostrarG/{idUsuario}', ['uses' => 'GlucosaController@mostrarG']);
Route::get('eliminarG/{idUsuario}/{idGlucosa}', ['uses' => 'GlucosaController@eliminarG']);
Route::get('updateG/{glucosa}/{hora}/{fecha}/{nota}/{idUsuario}/{idGlucosa}', ['uses' => 'GlucosaController@updateG']);


//PESO
Route::get('agregarP/{peso}/{hora}/{fecha}/{notas}/{idUsuario}',['uses'=> 'PesoController@agregarP']);
Route::get('mostrarP/{idUsuario}',['uses'=> 'PesoController@mostrarP']);
Route::get('mostrarPEst/{idUsuario}',['uses'=> 'PesoController@mostrarPEst']);
Route::get('ultimoP/{idUsuario}',['uses'=> 'PesoController@ultimoP']);
Route::get('eliminarP/{idUsuario}/{idPeso}', ['uses' => 'PesoController@eliminarP']);
Route::get('updateP/{peso}/{hora}/{fecha}/{idUsuario}/{idPeso}',['uses'=> 'PesoController@updateP']);


//PRESION ARTERIAL
Route::get('agregarPA/{sistolica}/{diastolica}/{pulso}/{fecha}/{hora}/{recordatorio}/{nota}/{idUsuario}',['uses'=> 'PresionArterialController@agregarPA']);
Route::get('mostrarPA/{idUsuario}', ['uses' => 'PresionArterialController@mostrarPA']);
Route::get('eliminarPA/{idUsuario}/{idPresionArterial}', ['uses' => 'PresionArterialController@eliminarPA']);
Route::get('updatePA/{sistolica}/{diastolica}/{pulso}/{fecha}/{hora}/{idUsuario}/{idPA}',['uses'=> 'PresionArterialController@updatePA']);


//MEDICAMENTO
Route::get('agregarM/{dosis}/{descripcion}/{hora}/{fecha}/{recordatorio}/{notas}/{idUsuario}',['uses'=> 'MedicamentoController@agregarM']);
Route::get('mostrarM/{idUsuario}', ['uses' => 'MedicamentoController@mostrarM']);
Route::get('eliminarM/{idUsuario}/{idMedicamento}', ['uses' => 'MedicamentoController@eliminarM']);
Route::get('updateM/{descripcion}/{dosis}/{hora}/{idUsuario}/{idMedicamento}',['uses'=> 'MedicamentoController@updateM']);


//PRUEBAS
Route::get('fecha/{idUsuario}', ['uses' => 'MedicamentoController@fecha']);

 