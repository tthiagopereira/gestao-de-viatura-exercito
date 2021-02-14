<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteConlumnFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropColumn('contato_motorista');
            $table->dropColumn('posto_motorista');
            $table->dropColumn('motorista');

            $table->integer('motorista_id')->unsigned()->nullable();
            $table->foreign('motorista_id')->references('id')->on('motoristas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropColumn('motorista_id')->unsigned();

            $table->string('contato_motorista');
            $table->string('posto_motorista');
            $table->string('motorista');
        });
    }
}
