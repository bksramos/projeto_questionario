<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('id');
            $table->string('code')->unique();
            $table->string('title');
            $table->UnsignedBigInteger('documento_origem_id');
            $table->UnsignedBigInteger('documento_tipo_id');
            $table->UnsignedBigInteger('orgao_emissor_id');
            $table->UnsignedBigInteger('user_id');
            $table->date('data');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('documento_origem_id')->references('id')->on('documento_origems');
            $table->foreign('documento_tipo_id')->references('id')->on('documento_tipos');
            $table->foreign('orgao_emissor_id')->references('id')->on('orgao_emissors');
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
        Schema::dropIfExists('documentos');
    }
}
