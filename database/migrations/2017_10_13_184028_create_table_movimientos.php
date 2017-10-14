<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idarticulo')->unsigned();
            $table->integer('idhcliente')->unsigned();
            $table->string('mov_factura');
            $table->integer('mov_entrada')->default(0);
            $table->integer('mov_salida')->default(0);
            $table->integer('mov_total')->default(0);
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->boolean('mov_estado')->default(true);
            $table->text('mov_obs');
            $table->timestamps();

            $table->foreign('idarticulo')->references('id')->on('articulos');
            $table->foreign('idhcliente')->references('id')->on('hclientes');
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
        Schema::dropIfExists('movimientos');
    }
}
