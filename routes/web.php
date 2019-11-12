<?php

Route::get('/', function () {
    return view('welcome');
});

//USUARIOS
Route::get('login/{contra}/{usuario}', ['uses' => 'UsuarioController@login']);