<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTbFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_fornecedores', function (Blueprint $table) {
            $table->foreign('id_endereco')
                ->references('id_endereco')->on('tb_endereco')
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
            $table->dropForeign('id_endereco');
        });
    }
}
