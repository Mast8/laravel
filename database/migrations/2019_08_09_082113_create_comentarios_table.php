<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('mensaje',90);
            //$table->string('url', 255)->nullable();
           
            //$table->integer('commentable_id')->unsigned();
            //$table->string('commentable_type');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

            $table->integer('pbi_id')->unsigned();
            $table->foreign('pbi_id')->references('id')->on('pbis')->onDelete("cascade");
            $table->dateTime('fecha');
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
        Schema::dropIfExists('comentarios');
    }
}
