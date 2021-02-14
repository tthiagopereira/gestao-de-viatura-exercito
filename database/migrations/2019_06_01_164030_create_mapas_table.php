<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mapas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chefe_viatura')->nullable();
            $table->string('motorista')->nullable();
            $table->string('missao');
            $table->string('itinerario');
            $table->string('hora_saida');
            $table->string('hora_entrada');
            $table->string('modelo');
            $table->string('placa')->nullable();
            $table->string('eb')->nullable();
            $table->string('documento');
            $table->string('contato')->nullable();
            $table->string('contato_motorista')->nullable();
            $table->boolean('fixo')->nullable();
            $table->date('data')->nullable();
            $table->integer('ficha_id')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapas');
    }
}
