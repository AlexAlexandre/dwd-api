<?php

use Illuminate\Database\Seeder;

class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lê o excel com a lista de municipios do brasil.
        \Excel::load('public/excel/lista_cidades.xls', function ($reader) {

            $result = $reader->all();
            $result = $result->toArray();

            foreach ($result as $value) {
                DB::table('tb_cidade')->insert(
                    [
                        'tx_nome_cidade' => $value["municipio"],
                        'sg_uf' => $value["pais"]
                    ]
                );
            }
        });


        /**
         * Insere um registro 'Nao informado' relacionado a cada UF
         */
        $estados = DB::table('tb_uf')->get();
        foreach ($estados as $uf) {
            DB::table('tb_cidade')->insert(
                [
                    'tx_nome_cidade' => 'Não Informado',
                    'sg_uf' => $uf->sg_uf
                ]
            );
        }
    }
}
