<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor', function (Blueprint $table) {
            $table->id();
            $table->string('RUT');
            $table->unique('RUT', 'unique_RUT');
            $table->string('razonSocial');
            $table->string('nombreFantasia');
            $table->string('tipoOrganizacion');
            $table->string('rubro');
            $table->string('telefonoEmpresa');
            $table->string('direccion');
            $table->string('descripcion');
            $table->foreign('id')->references('id')->on('usuario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendedor');
    }
}
