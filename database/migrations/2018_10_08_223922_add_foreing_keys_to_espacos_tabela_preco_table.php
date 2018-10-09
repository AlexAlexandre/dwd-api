<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeysToEspacosTabelaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_espacos_tabela_preco', function (Blueprint $table) {
            $table->foreign('id_tabela_preco')
                ->references('id_tabela_preco')->on('tb_tabela_preco')
                ->onDelete('cascade');
        });

        Schema::table('tb_espacos_tabela_preco', function (Blueprint $table) {
            $table->foreign('id_espacos')
                ->references('id_espacos')->on('tb_espacos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_fornecedores', function (Blueprint $table) {
            $table->dropForeign('id_tabela_preco');
        });

        Schema::table('tb_fornecedores', function (Blueprint $table) {
            $table->dropForeign('id_espacos');
        });
    }
}
