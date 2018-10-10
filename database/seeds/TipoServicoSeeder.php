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
          ['tx_tipo_servico' => 'Equipamentos Instalados Auditório'],
          ['tx_tipo_servico' => 'Técnicos para utilização dos equipamentos do Auditório'],
          ['tx_tipo_servico' => 'Equipamentos Extras para Auditório ou Salas'],
          ['tx_tipo_servico' => 'Equipamentos de Iluminação (teatro , gravação e decorativa)'],
          ['tx_tipo_servico' => 'Equipamentos de Informática'],
          ['tx_tipo_servico' => 'Diversos'],
        ];

        foreach ($tipoServico as $value) {
            TipoServico::create($value);
        }
    }
}
