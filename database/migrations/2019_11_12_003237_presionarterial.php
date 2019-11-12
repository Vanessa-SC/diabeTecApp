<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Presionarterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRESIONARTERIAL', function (Blueprint $table) {
            $table->bigIncrements('idPresionArterial');
            $table->string('sistolica');
            $table->string('diastolica');
            $table->string('pulso');
            $table->date('fecha');
            $table->time('hora');
            $table->string('nota',120);
            $table->integer('idUsuario');
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
        Schema::dropIfExists('PRESIONARTERIAL');
    }
}
