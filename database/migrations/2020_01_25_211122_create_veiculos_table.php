<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marca_veiculo', 20);
            $table->string('modelo_veiculo', 20);
            $table->year('ano_veiculo');
            $table->year('ano_modelo_veiculo');
            $table->string('cor_veiculo', 20);
            $table->string('placa_veiculo', 7)->unique();
            $table->bigInteger('quilometragem_veiculo');
            $table->decimal('preco_veiculo', 10, 2);
            $table->boolean('ipva_veiculo');
            $table->boolean('troca_veiculo');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('combustivel_id');
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('combustivel_id')->references('id')->on('combustivels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
