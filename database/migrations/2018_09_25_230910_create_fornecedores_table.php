<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_fornecedores', function (Blueprint $table) {
            $table->increments('id_fornecedores')->unsigned();
            $table->integer('id_endereco')->unsigned(); // FK

            $table->string('tx_nome_fornecedor', 100);
            $table->string('tx_razao_social_fornecedor', 45);
            $table->string('tx_nome_fantasia_fornecedor', 45);
            $table->string('nr_cnpj_fornecedor', 15);
            $table->string('nr_inscricao_estadual', 45)->nullable();
            $table->string('tx_nome_contato_fornecedor', 45);
            $table->string('tx_email_comercial', 45);
            $table->string('nr_telefone_direto', 15);
            $table->string('nr_telefone_celular', 15)->nullable();
            $table->string('tx_cargo', 100);
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
        Schema::dropIfExists('fornecedores');
    }
}
