<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculoAcessoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo_acessorios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('veiculo_id');
            $table->unsignedBigInteger('acessorio_id');
            //$table->timestamps();

            $table->foreign('veiculo_id')->references('id')->on('veiculos');
            $table->foreign('acessorio_id')->references('id')->on('acessorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculo_acessorios');
    }
}
