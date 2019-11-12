<?php

Route::get('/', function () {
    return view('welcome');
});

//USUARIOS
Route::get('login/{contra}/{usuario}', ['uses' => 'UsuarioController@login']);
Route::get('registro/{nombre}/{telefono}/{email}/{contra}/{sexo}/{tipoDiab}/{fechaNac}', ['uses' => 'UsuarioController@registrar']);