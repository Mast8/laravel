<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialPbisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_pbis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accion',30);
            $table->string('motivo',90);
            $table->string('realizada_por',30);
            $table->dateTime('creada_el');
            

            $table->integer('pbi_id')->unsigned();
            $table->foreign('pbi_id')->references('id')->on('pbis')->onDelete("cascade");
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
        Schema::dropIfExists('historial_pbis');
    }
}
