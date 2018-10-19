<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_espacos', function (Blueprint $table) {
            $table->increments('id_espacos')->unsigned();
            $table->integer('id_endereco')->unsigned()->nullable();

            // Abas dados do empreendimento
            $table->string('tx_razao_social', 45)->nullable();
            $table->string('nr_cnpj_cliente', 15)->nullable();
            $table->string('nr_inscricao_estadual', 45)->nullable();
            $table->string('nr_inscricao_municipal', 45)->nullable();
            $table->string('tx_nome_fantasia', 45)->nullable();
            $table->string('tx_nome_contato', 45)->nullable();
            $table->string('tx_email_comercial', 45)->nullable();
            $table->string('nr_telefone', 15)->nullable();

            // Abas dados do Espaço
            $table->string('status_espaco', 45)->nullable();
            $table->string('tx_nome_espaco', 45)->nullable();
            $table->string('tx_nome_condominio', 45)->nullable();
            $table->integer('qtd_vagas_condominio')->nullable();
            $table->text('tx_regras_condominio')->nullable();
            $table->string('tx_contato_condominio', 45)->nullable();
            $table->string('hr_inicio_funcionamento')->nullable();
            $table->string('hr_fim_funcionamento')->nullable();
            $table->string('tx_nome_administradora', 45)->nullable();
            $table->string('tx_contato_administradora', 45)->nullable();
            $table->string('nr_unidade', 45)->nullable();

            // Abas dados do Responsável
            $table->string('tx_nome_completo', 45)->nullable();
            $table->string('nr_tel_resp', 45)->nullable();
            $table->string('nr_cpf', 11)->nullable();
            $table->string('tx_cargo', 45)->nullable();
            $table->string('tx_email_comercial_resp', 45)->nullable();
            $table->string('tx_desc_ativ_resp', 200)->nullable();

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
        Schema::dropIfExists('tb_espacos');
    }
}
