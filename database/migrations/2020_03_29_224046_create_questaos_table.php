<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('título');
            $table->UnsignedBigInteger('questao_categorias_id');
            $table->UnsignedBigInteger('questao_tipos_id');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('questao_categorias_id')->references('id')->on('questao_categorias');
            $table->foreign('questao_tipos_id')->references('id')->on('questao_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questaos');
    }
}
