<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    protected $table        = 'tb_cidade';
    protected $primaryKey   = 'id_cidade';

    protected $fillable = ['tx_nome_cidade', 'sg_uf'];

    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class,'sg_uf', 'sg_uf');
    }

    public function endereco(): HasMany
    {
        return $this->hasMany(Endereco::class, 'id_cidade', 'id_cidade');
    }
}
