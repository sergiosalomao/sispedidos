<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categoria extends Migration
{
    public function up()
    {
        Schema::create(
            'categorias',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('descricao');
                $table->timestamps();
            }
        );
    }


    public function down()
    {
        //
    }
}
