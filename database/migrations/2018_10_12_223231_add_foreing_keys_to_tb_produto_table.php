<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeysToTbProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_produtos', function (Blueprint $table) {
            $table->foreign('id_tabela_preco')
                ->references('id_tabela_preco')->on('tb_tabela_preco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_produtos', function (Blueprint $table) {
            $table->dropForeign('id_tabela_preco');
        });
    }
}
