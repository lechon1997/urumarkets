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
            $table->integer('id')->autoIncrement();
            $table->string('primerNombre');
            $table->string('segundoNombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('contrasenia');
            $table->string('cedula');
            $table->string('email');
            $table->unique('cedula', 'unique_cedula');
            $table->unique('email', 'unique_email');            
            $table->string('telefono');

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
