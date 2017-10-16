<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEstadoArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->boolean('art_estado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('articulos', function (Blueprint $table) {
            $table->boolean('art_estado')->default(true);
        });
    }
}
