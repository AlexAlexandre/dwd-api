<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoServico extends Model
{
    protected $table = 'tb_tipo_servico';
    protected $primaryKey = 'id_tipo_servico';

    protected $fillable = ['tx_tipo_servico'];

    public function tabelaPreco(): HasMany
    {
        return $this->hasMany(TabelaPreco::class, 'id_fornecedores','id_fornecedores');
    }
}
