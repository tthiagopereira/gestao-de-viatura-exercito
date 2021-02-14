<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotoristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motoristas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('categoria_a')->nullable();
            $table->boolean('categoria_b')->nullable();
            $table->boolean('categoria_c')->nullable();
            $table->boolean('categoria_d')->nullable();
            $table->boolean('categoria_e')->nullable();

            $table->string('carteira_motorista');
            $table->date('habilitacao');
            $table->date('habilitacao_vencimento');

            $table->string('bi');

            $table->longText('observacao')->nullable();

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
        Schema::dropIfExists('motoristas');
    }
}
