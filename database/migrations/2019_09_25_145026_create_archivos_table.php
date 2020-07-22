<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('tarea_id')->unsigned()->nullable();
            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete("cascade");
            /*
            $table->integer('pbi_id')->unsigned()->nullable();
            $table->foreign('pbi_id')->references('id')->on('pbis')->onDelete("cascade");*/
            $table->string('nombre_archivo',50);
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
        Schema::dropIfExists('archivos');
    }
}
