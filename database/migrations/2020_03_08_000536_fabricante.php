<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fabricante extends Migration
{
    public function up()
    {
        Schema::create(
            'fabricantes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome_fantasia');
  $table->string('razao_social');
                $table->string('cpf_cnpj')->nullable();
 $table->string('site')->nullable();
                $table->string('telefone')->nullable();
                $table->string('contato')->nullable();
                $table->string('email')->nullable();
                $table->string('cep')->nullable();
                $table->string('bairro')->nullable();
                $table->string('logradouro')->nullable();
                $table->string('numero')->nullable();
                $table->string('cidade')->nullable();
                $table->string('uf')->nullable();
                $table->text('obs')->nullable();
                $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
                $table->timestamps();
            }
        );
    }


    public function down()
    {
        //
    }
}
