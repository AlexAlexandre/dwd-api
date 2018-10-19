<?php

use Illuminate\Database\Seeder;
use App\Models\TipoServico;

class TipoServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoServico = [
          ['tx_tipo_servico' => 'Sala, Foyer ou Praça'],
          ['tx_tipo_servico' => 'Alimentos e Bebidas (A&amp;B)'],
          ['tx_tipo_servico' => 'Serviço de Sala'],
          ['tx_tipo_servico' => 'Equipamentos de Áudio e Vídeo Auditório'],
          ['tx_tipo_servico' => 'Equipamentos de Áudio e Vídeo Sala'],
          ['tx_tipo_servico' => 'Equipamentos de Iluminação'],
          ['tx_tipo_servico' => 'Internet'],
          ['tx_tipo_servico' => 'Decoração'],
          ['tx_tipo_servico' => 'Estacionamento'],
          ['tx_tipo_servico' => 'Mobília'],
          ['tx_tipo_servico' => 'Gerador'],
          ['tx_tipo_servico' => 'Ambulância'],
          ['tx_tipo_servico' => 'Mão de Obra (entra Fotografo, Bombeiro, recepcionista, garçom, barman)'],
          ['tx_tipo_servico' => 'Espaço Publicitário'],
          ['tx_tipo_servico' => 'Outros'],
        ];

        foreach ($tipoServico as $value) {
            TipoServico::create($value);
        }
    }
}
