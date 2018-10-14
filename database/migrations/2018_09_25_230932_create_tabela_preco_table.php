<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tabela_preco', function (Blueprint $table) {
            $table->increments('id_tabela_preco')->unsigned();
            $table->integer('id_tipo_servico')->unsigned();
            $table->integer('id_fornecedores')->unsigned();
            $table->string('tx_nome_tabela_preco', 100);
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
        Schema::dropIfExists('tabela_preco');
    }
}
