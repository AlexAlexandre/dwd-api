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
        'sg_uf',
        'tx_localidade',
        'tx_cep',
        'tx_logradouro',
        'nr_numero',
        'tx_bairro',
        'tx_complemento',
        'tx_tipodelogradouro'
    ];

    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class, 'sg_uf', 'sg_uf');
    }

    public function fornecedores(): HasMany
    {
        return $this->hasMany(Fornecedores::class, 'id_endereco', 'id_endereco');
    }
}
