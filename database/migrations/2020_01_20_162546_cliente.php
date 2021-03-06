<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    public function up()
    {
        Schema::create(
            'clientes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome');
                $table->string('cpfcnpj')->nullable();
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
