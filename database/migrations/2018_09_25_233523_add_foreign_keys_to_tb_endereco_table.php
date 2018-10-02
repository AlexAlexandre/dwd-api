<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTbEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_endereco', function (Blueprint $table) {
            $table->foreign('sg_uf')
                ->references('sg_uf')->on('tb_uf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_endereco', function (Blueprint $table) {
            $table->dropForeign('sg_uf');
        });
    }
}
