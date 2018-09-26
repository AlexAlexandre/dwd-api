<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTbTabelaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tabela_preco', function (Blueprint $table) {
            $table->foreign('id_tipo_servico')
                ->references('id_tipo_servico')->on('tb_tipo_servico');

            $table->foreign('id_fornecedores')
                ->references('id_fornecedores')->on('tb_fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_tabela_preco', function (Blueprint $table) {
            $table->dropForeign('id_tipo_servico');
        });

        Schema::table('tb_tabela_preco', function (Blueprint $table) {
            $table->dropForeign('id_fornecedores');
        });
    }
}
