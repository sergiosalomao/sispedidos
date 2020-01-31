<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fornecedor extends Migration
{
    public function up()
    {
        Schema::create(
            'fornecedores',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome');
                $table->string('cpfcnpj');
                $table->timestamps();
            }
        );
    }


    public function down()
    {
        //
    }
}
