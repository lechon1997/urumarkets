<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Publicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('titulo');
            $table->string('estado');
            $table->string('tipoMoneda');
            $table->float('precio')->nullable();
            $table->string('descripcion');
            $table->boolean('conPrecio');
            $table->boolean('oferta')->nullable();
            $table->float('porcentajeOferta')->nullable();
            $table->integer('limitePorPersona')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('deshabilitado');
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publicacion');
    }
}
