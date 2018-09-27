<?php

use Illuminate\Database\Seeder;

use App\Models\Uf;

class UfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadosBrasileiros = [
            ['sg_uf' => 'AC', 'tx_nome_uf' => 'Acre'],
            ['sg_uf' => 'AL', 'tx_nome_uf' => 'Alagoas'],
            ['sg_uf' => 'AP', 'tx_nome_uf' => 'Amapá'],
            ['sg_uf' => 'AM', 'tx_nome_uf' => 'Amazonas'],
            ['sg_uf' => 'BA', 'tx_nome_uf' => 'Bahia'],
            ['sg_uf' => 'CE', 'tx_nome_uf' => 'Ceará'],
            ['sg_uf' => 'DF', 'tx_nome_uf' => 'Distrito Federal'],
            ['sg_uf' => 'ES', 'tx_nome_uf' => 'Espírito Santo'],
            ['sg_uf' => 'GO', 'tx_nome_uf' => 'Goiás'],
            ['sg_uf' => 'MA', 'tx_nome_uf' => 'Maranhão'],
            ['sg_uf' => 'MT', 'tx_nome_uf' => 'Mato Grosso'],
            ['sg_uf' => 'MS', 'tx_nome_uf' => 'Mato Grosso do Sul'],
            ['sg_uf' => 'MG', 'tx_nome_uf' => 'Minas Gerais'],
            ['sg_uf' => 'PA', 'tx_nome_uf' => 'Pará'],
            ['sg_uf' => 'PB', 'tx_nome_uf' => 'Paraíba'],
            ['sg_uf' => 'PR', 'tx_nome_uf' => 'Paraná'],
            ['sg_uf' => 'PE', 'tx_nome_uf' => 'Pernambuco'],
            ['sg_uf' => 'PI', 'tx_nome_uf' => 'Piauí'],
            ['sg_uf' => 'RJ', 'tx_nome_uf' => 'Rio de Janeiro'],
            ['sg_uf' => 'RN', 'tx_nome_uf' => 'Rio Grande do Norte'],
            ['sg_uf' => 'RS', 'tx_nome_uf' => 'Rio Grande do Sul'],
            ['sg_uf' => 'RO', 'tx_nome_uf' => 'Rondônia'],
            ['sg_uf' => 'RR', 'tx_nome_uf' => 'Roraima'],
            ['sg_uf' => 'SC', 'tx_nome_uf' => 'Santa Catarina'],
            ['sg_uf' => 'SP', 'tx_nome_uf' => 'São Paulo'],
            ['sg_uf' => 'SE', 'tx_nome_uf' => 'Sergipe'],
            ['sg_uf' => 'TO', 'tx_nome_uf' => 'Tocantins']
        ];

        foreach ($estadosBrasileiros as $estado) {
            Uf::create($estado);
        }
    }
}
