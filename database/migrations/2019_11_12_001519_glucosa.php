<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Glucosa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GLUCOSA', function (Blueprint $table) {
            $table->bigIncrements('idGlucosa');
            $table->string('toma',45);
            $table->date('fecha');
            $table->time('hora');
            $table->string('nota',130);
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
        Schema::dropIfExists('GLUCOSA');
    }

}
