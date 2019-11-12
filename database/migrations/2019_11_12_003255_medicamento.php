<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MEDICAMENTO', function (Blueprint $table) {
            $table->bigIncrements('idMedicamento');
            $table->string('descripcion');
            $table->string('dosis');
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
        Schema::dropIfExists('MEDICAMENTO');
    }
}
