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
