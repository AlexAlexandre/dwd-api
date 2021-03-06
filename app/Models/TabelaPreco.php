<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TabelaPreco extends Model
{
    protected $table = 'tb_tabela_preco';
    protected $primaryKey = 'id_tabela_preco';

    protected $fillable = [
        'id_tipo_servico',
        'id_fornecedores',
        'tx_nome_tabela_preco',
    ];

    public function tipoServico(): BelongsTo
    {
        return $this->belongsTo(TipoServico::class, 'id_tipo_servico', 'id_tipo_servico');
    }

    public function fornecedores(): BelongsTo
    {
        return $this->belongsTo(Fornecedores::class, 'id_fornecedores', 'id_fornecedores');
    }

    public function espacosTabela(): HasMany
    {
        return $this->hasMany(EspacosTabelaPreco::class, 'id_tabela_preco', 'id_tabela_preco');
    }

    public function produtos(): HasMany
    {
        return $this->hasMany(Produtos::class, 'id_tabela_preco', 'id_tabela_preco');
    }
}
