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

//GLUCOSA
Route::get('agregarG/{glucosa}/{hora}/{fecha}/{periodo}/{actividad}/{medicacion}/{recordatorio}/{nota}/{idUsuario}', ['uses' => 'GlucosaController@agregarG']);

//PESO
Route::get('agregarP/{peso}/{hora}/{fecha}/{notas}/{idUsuario}',['uses'=> 'PesoController@agregarP']);

//PRESION ARTERIAL
Route::get('agregarPA/{sistolica}/{diastolica}/{pulso}/{fecha}/{hora}/{recordatorio}/{nota}/{idUsuario}',['uses'=> 'PresionArterialController@agregarPA']);

//MEDICAMENTO
Route::get('agregarM/{dosis}/{descripcion}/{hora}/{fecha}/{recordatorio}/{notas}/{idUsuario}',['uses'=> 'MedicamentoController@agregarM']);

