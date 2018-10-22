<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_salas', function (Blueprint $table) {
            $table->increments('id_salas');
            $table->string('tx_nome_salas',45);
            $table->decimal('nr_metragem_salas', 8,2);
            $table->decimal('nr_altura_pe_direito_salas', 8,2);
            $table->string('tx_img_sala', 100)->nullable();
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
        Schema::dropIfExists('tb_salas');
    }
}
