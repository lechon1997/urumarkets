<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('primerNombre');
            $table->string('segundoNombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('cedula')->unique();
            $table->string('email')->unique();  
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono');
            $table->string('imagen')->nullable();
            $table->boolean('isadmin');
            //Faltan foreign keys localidad y departamento.
            $table->integer('idDepartamento');
            $table->integer('idLocalidad');

              
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
