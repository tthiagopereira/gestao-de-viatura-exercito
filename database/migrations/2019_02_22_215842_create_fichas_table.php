<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motorista')->nullable();
            $table->string('chefe_viatura')->nullable();

            $table->integer('servico_viatura_id')->unsigned();
            $table->integer('viatura_id')->unsigned();

            $table->foreign('servico_viatura_id')->references('id')->on('servico_viaturas')->onDelete('cascade');
            $table->foreign('viatura_id')->references('id')->on('viaturas')->onDelete('cascade');
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
        Schema::dropIfExists('fichas');
    }
}
