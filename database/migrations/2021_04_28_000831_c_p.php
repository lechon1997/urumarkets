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
        	$table->integer('id')->autoIncrement();
        	$table->date('fecha_compra');

        	$table->integer('idCliente');
            $table->integer('idPublicacion');

            $table->foreign('idCliente')->references('id_cliente')->on('cliente');   
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
