<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espacos extends Model
{
    protected $table = 'tb_espacos';
    protected $primaryKey = 'id_espacos';

    protected $fillable = [
        'tx_razao_social',
        'nr_cnpj_cliente',
        'nr_inscricao_estadual',
        'nr_inscricao_municipal',
        'tx_nome_fantasia',
        'tx_nome_contato',
        'tx_email_comercial',
        'nr_telefone',
        'status_espaco',
        'tx_nome_condominio',
        'qtd_vagas_condominio',
        'tx_regras_condominio',
        'tx_contato_condominio',
        'hr_inicio_funcionamento',
        'hr_fim_funcionamento',
        'tx_nome_administradora',
        'tx_contato_administradora',
        'nr_unidade',
        'tx_endereco',
        'tx_nome_completo',
        'nr_tel_resp',
        'nr_cpf',
        'tx_cargo',
        'tx_email_comercial_resp',
        'tx_desc_ativ_resp'
    ];
}
