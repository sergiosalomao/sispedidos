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
