<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USUARIO', function (Blueprint $table) {
            $table->Increments('idUsuario');
            $table->string('nombre');
            $table->string('telefono',14);
            $table->string('email',80)->unique();
            $table->string('contrasena');
            $table->string('sexo');
            $table->string('tipoDiabetes');
            $table->date('fecha_nac');
            $table->engine = 'InnoDB';	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USUARIO');
    }
}
