<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('c_p', function (Blueprint $table) {
        	$table->id()->autoIncrement();
        	$table->date('fecha_compra');

        	$table->bigInteger('idCliente')->unsigned();
            $table->bigInteger('idPublicacion')->unsigned();

            $table->foreign('idCliente')->references('id')->on('cliente');   
            $table->foreign('idPublicacion')->references('id')->on('publicacion');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
