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
        'tx_email_comercial',
        'nr_telefone'
    ];
}
