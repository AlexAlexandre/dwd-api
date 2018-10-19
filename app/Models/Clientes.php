<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'tb_clientes';
    protected $primaryKey = 'id_clientes';

    protected $fillable = [
        'tx_razao_social',
        'nr_cnpj_cliente',
        'nr_inscricao_estadual',
        'nr_inscricao_municipal',
        'tx_nome_fantasia',
        'tx_nome_contato',
        'tx_nome_contato_sec',
        'tx_email_comercial',
        'tx_email_comercial_sec',
        'nr_telefone',
        'nr_telefone_sec'
    ];
}
