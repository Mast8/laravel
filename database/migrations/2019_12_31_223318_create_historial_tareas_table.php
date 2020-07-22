<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accion_tar',30);
            $table->string('motivo_tar',90);
            $table->string('realizada_por_tar',30);
            $table->dateTime('creada_el_tar');
            

            $table->integer('tarea_id')->unsigned();
            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_tareas');
    }
}
