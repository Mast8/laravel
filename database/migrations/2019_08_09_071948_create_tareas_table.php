<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',70);
            $table->longText('descripcion',90)->nullable();
            $table->string('creado_por',70);
            $table->boolean('eliminado')->default(false);
            $table->string('concluido_por',70)->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('responsable',70)->nullable();
            //$table->integer('company_id')->unsigned()->nullable();
            //$table->foreign('company_id')->references('id')->on('companies');
            $table->integer('pbi_id')->unsigned()->nullable();
            $table->foreign('pbi_id')->references('id')->on('pbis')->onDelete("cascade");
            

            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');

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
        Schema::dropIfExists('tareas');
    }
}
