<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto extends Migration
{
    public function up()
    {
        Schema::create(
            'produtos',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->date('data_lancamento');
                $table->string('titulo');
                $table->string('descricao');
                $table->double('valor', 8, 2);
                $table->enum('status', ['Disponivel', 'Não disponivel'])->default('Não disponivel');
                $table->unsignedBigInteger('categoria_id');
                $table->foreign('categoria_id')->references('id')->on('categorias');
                $table->string('codigobarras');
                $table->date('data_fabricacao');
                $table->date('data_vencimento');
                $table->string('unidade_medida');
                $table->text('obs')->nullable();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('fornecedor_id');
                $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
                $table->unsignedBigInteger('fabricante_id');
                $table->foreign('fabricante_id')->references('id')->on('fabricantes');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        //
    }
}
