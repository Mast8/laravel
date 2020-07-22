<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbis', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo',90);
            $table->longText('descripcion',90)->nullable();
            $table->string('creado_por',70)->nullable();
            $table->boolean('eliminado')->default(false);
            
            $table->integer('estimacion')->nullable();

            $table->integer('sprint_id')->unsigned();
            $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete("cascade");


            $table->integer('prioridad_id')->unsigned();
            $table->foreign('prioridad_id')->references('id')->on('prioridads');

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
        Schema::dropIfExists('pbis');
    }
}
