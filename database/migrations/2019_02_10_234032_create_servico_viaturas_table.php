<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servico_viaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->date('data_saida');
            $table->date('data_entrada');
            $table->time('hora_saida');
            $table->time('hora_entrada');
            $table->string('local_saida');
            $table->string('destino');
            $table->string('missao');
            $table->string('viatura');
            $table->string('transporte');
            $table->integer('quantidade_pessoa');
            $table->string('status');
            $table->string('chefe_viatura');
            $table->longText('observacao')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servico_viaturas');
    }
}
