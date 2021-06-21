<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Historial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('publicacion_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('vendedor_id')->unsigned();
            $table->integer('cantidad');
            $table->date('fecha');

            //Foreign keys
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('vendedor_id')->references('id')->on('vendedor');
            $table->foreign('publicacion_id')->references('id')->on('publicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historial');
    }
}
