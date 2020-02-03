<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagem extends Migration
{
    public function up()
    {
        Schema::create(
            'imagens',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->enum('tipo', ['capa', 'produto'])->default('produto');
                $table->string('imagem')->nullable();
                $table->unsignedBigInteger('produto_id');
                $table->foreign('produto_id')->references('id')->on('produtos');
                $table->timestamps();
            }
        );
    }


    public function down()
    {
        //
    }
}
