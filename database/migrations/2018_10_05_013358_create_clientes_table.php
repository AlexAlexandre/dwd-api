<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_clientes', function (Blueprint $table) {
            $table->increments('id_clientes')->unsigned();
            $table->string('tx_razao_social', 45);
            $table->string('nr_cnpj_cliente', 15);
            $table->string('nr_inscricao_estadual', 45);
            $table->string('nr_inscricao_municipal', 45);
            $table->string('tx_nome_fantasia', 45);
            $table->string('tx_nome_contato', 45);
            $table->string('tx_email_comercial', 45);
            $table->string('nr_telefone', 15);
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
        Schema::dropIfExists('tb_clientes');
    }
}
