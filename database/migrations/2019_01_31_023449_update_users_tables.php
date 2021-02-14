<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_guerra');
            $table->string('posto_graduacao');
            $table->string('identidade_militar');
            $table->string('contato');
            $table->string('escalao');
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nome_guerra');
            $table->dropColumn('posto_graduacao');
            $table->dropColumn('identidade_militar');
            $table->dropColumn('contato');
            $table->dropColumn('escalao');
            $table->dropColumn('tipo');
        });
    }
}
