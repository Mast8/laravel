<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('usuario',30);
                $table->string('email',50)->unique();
                $table->boolean('activado')->default(false);
                $table->string('password',70);
                $table->longText('descripcion_user',70)->nullable();
                $table->string('nombres',30)->nullable();
                $table->string('apellidos',30)->nullable();
                //$table->string('ciudad')->nullable();
                $table->integer('role_id')->unsigned()->default(3);

                $table->rememberToken();
                $table->timestamps();
                
            });
         }

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
