<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produtos extends Model
{
    protected $table = 'tb_produtos';
    protected $primaryKey = 'id_produtos';
    public $incrementing = false;

    protected $fillable = [
        'id_tabela_preco',
        'tx_descricao_servico',
        'nr_valor',
        'nr_percentagem_desconto'
    ];

    public function tabelaPreco(): BelongsTo
    {
        return $this->belongsTo(TabelaPreco::class, 'id_tabela_preco', 'id_tabela_preco');
    }
}
