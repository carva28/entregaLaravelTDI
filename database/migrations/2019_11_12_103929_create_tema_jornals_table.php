<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaJornalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_jornals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jornal_id')->unsigned();
            $table->foreign('jornal_id')->references('id')->on('jornals');
            $table->bigInteger('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temas');
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
        Schema::dropIfExists('tema_jornals');
    }
}
