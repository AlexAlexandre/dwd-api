<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeysToEspacosSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_espacos_sala', function (Blueprint $table) {
            $table->foreign('id_espacos')
                ->references('id_espacos')->on('tb_espacos');

            $table->foreign('id_salas')
                ->references('id_salas')->on('tb_salas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_espacos_sala', function (Blueprint $table) {
            $table->dropForeign('id_salas');
        });

        Schema::table('tb_espacos_sala', function (Blueprint $table) {
            $table->dropForeign('id_espacos');
        });
    }
}
