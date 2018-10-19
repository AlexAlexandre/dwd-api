<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Espacos extends Model
{
    protected $table = 'tb_espacos';
    protected $primaryKey = 'id_espacos';

    protected $fillable = [
        'id_endereco',
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
        'tx_nome_completo',
        'nr_tel_resp',
        'nr_cpf',
        'tx_cargo',
        'tx_email_comercial_resp',
        'tx_desc_ativ_resp'
    ];

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'id_endereco', 'id_endereco');
    }

    public function espacosTabela(): HasMany
    {
        return $this->hasMany(EspacosTabelaPreco::class, 'id_espacos', 'id_espacos');
    }

    public function espacosSalas(): HasMany
    {
        return $this->hasMany(EspacosSalas::class, 'id_espacos', 'id_espacos');
    }
}
