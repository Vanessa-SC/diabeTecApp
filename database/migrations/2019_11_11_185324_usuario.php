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
            $table->string('nombre',60);
            $table->string('telefono',14);
            $table->string('email',80)->unique();
            $table->string('contrasena',60);
            $table->string('sexo',45);
            $table->string('tipoDiabetes',45);
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
