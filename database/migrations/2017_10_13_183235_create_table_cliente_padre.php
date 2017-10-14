<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClientePadre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cli_ci');
            $table->string('cli_exp');
            $table->string('cli_nombre');
            $table->string('cli_nit');
            $table->text('cli_direccion');
            $table->string('cli_contacto');
            $table->string('cli_estado');
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
        Schema::dropIfExists('pclientes');
    }
}
