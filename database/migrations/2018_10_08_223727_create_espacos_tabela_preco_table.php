<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspacosTabelaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_espacos_tabela_preco', function (Blueprint $table) {
            $table->increments('id_espacos_tabela_preco');
            $table->integer('id_tabela_preco')->unsigned();
            $table->integer('id_espacos')->unsigned();
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
        Schema::dropIfExists('tb_espacos_tabela_preco');
    }
}
