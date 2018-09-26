<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->increments('id_endereco')->unsigned();
            $table->integer('id_cidade')->unsigned(); //FK
            $table->string('tx_cep', 20);
            $table->string('tx_logradouro', 100);
            $table->string('nr_numero', 45);
            $table->string('tx_bairro', 100);
            $table->string('tx_complemento', 200)->nullable();
            $table->string('tx_tipodelogradouro', 45)->nullable();
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
        Schema::dropIfExists('endereco');
    }
}
