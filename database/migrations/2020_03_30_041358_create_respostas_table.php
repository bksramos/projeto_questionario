<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('documento_id');
            $table->UnsignedBigInteger('questao_id');
            $table->UnsignedBigInteger('alternativa_id');
            $table->UnsignedBigInteger('user_id');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->foreign('questao_id')->references('id')->on('questaos');
            $table->foreign('alternativa_id')->references('id')->on('alternativas');
            $table->foreign('user_id')->references('id')->on('users');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
