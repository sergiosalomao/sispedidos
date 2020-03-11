<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'produtos',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->date('datacadastro');
                $table->date('data_fabricacao')->nullable();
                $table->date('data_validade')->nullable();
                $table->string('descricao');
                $table->string('imagem');
                $table->unsignedBigInteger('fornecedor_id');
                $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
                $table->unsignedBigInteger('fabricante_id');
                $table->foreign('fabricante_id')->references('id')->on('fabricantes');
                $table->unsignedBigInteger('categoria_id');
                $table->foreign('categoria_id')->references('id')->on('categorias');



                //$table->enum('status', ['Iniciado', 'Não Iniciado', 'Em andamento','Concluido'])->default('Não Iniciado');
                $table->timestamps();
            }
        );
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
