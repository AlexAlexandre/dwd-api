<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fornecedores extends Model
{
    protected $table = 'tb_fornecedores';
    protected $primaryKey = 'id_fornecedores';

    protected $fillable = [
        'id_endereco',
        'tx_nome_fornecedor',
        'tx_razao_social_fornecedor',
        'tx_nome_fantasia_fornecedor',
        'nr_cnpj_fornecedor',
        'nr_inscricao_estadual',
        'tx_nome_contato_fornecedor',
        'tx_email_comercial',
        'nr_telefone_direto',
        'nr_telefone_celular',
        'tx_cargo',
    ];

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'id_endereco', 'id_endereco');
    }

    public function tabelaPreco(): HasMany
    {
        return $this->hasMany(TabelaPreco::class, 'id_fornecedores','id_fornecedores');
    }
}
