<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PESO', function (Blueprint $table) {
            $table->bigIncrements('idPeso');
            $table->string('peso');
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
        Schema::dropIfExists('PESO');
    }
}
