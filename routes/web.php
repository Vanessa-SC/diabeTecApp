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