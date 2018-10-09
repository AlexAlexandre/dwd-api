<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspacosTabelaPreco extends Model
{
    protected $table = 'tb_espacos_tabela_preco';
    protected $primaryKey = 'id_espacos_tabela_preco';

    protected $fillable = [
        'id_tabela_preco',
        'id_espacos'
    ];

    public function tabelaPreco(): BelongsTo
    {
        return $this->belongsTo(TabelaPreco::class, 'id_tabela_preco', 'id_tabela_preco');
    }

    public function espacos(): BelongsTo
    {
        return $this->belongsTo(Espacos::class, 'id_espacos', 'id_espacos');
    }
}
