<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endereco extends Model
{
    protected $table = 'tb_endereco';
    protected $primaryKey = 'id_endereco';

    protected $fillable = [
        'id_cidade',
        'tx_cep',
        'tx_logradouro',
        'nr_numero',
        'tx_bairro',
        'tx_complemento',
        'tx_tipodelogradouro'
    ];

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'id_cidade', 'id_cidade');
    }

    public function fornecedores(): HasMany
    {
        return $this->hasMany(Fornecedores::class, 'id_endereco', 'id_endereco');
    }
}
