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
            $table->integer('id')->autoIncrement();
            $table->string('titulo');
            $table->string('estado');
            $table->string('tipoMoneda');
            $table->float('precio');
            $table->string('descripcion');
            $table->boolean('conPrecio');
            $table->boolean('oferta');
            $table->integer('limitePorPersona');
            $table->string('foto');
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
        Schema::drop('publicacion');
    }
}
