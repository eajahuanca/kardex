<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClienteHijo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpcliente')->unsigned();
            $table->string('cli_ci');
            $table->string('cli_exp');
            $table->string('cli_nombre');
            $table->string('cli_nit');
            $table->text('cli_direccion');
            $table->string('cli_contacto');
            $table->string('cli_estado');
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idpcliente')->references('id')->on('pclientes');
            $table->foreign('idregistra')->references('id')->on('users');
            $table->foreign('idactualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hclientes');
    }
}
