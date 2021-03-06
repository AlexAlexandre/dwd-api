<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uf extends Model
{
    protected $table = 'tb_uf';
    protected $primaryKey = 'sg_uf';
    public $incrementing = false;

    protected $fillable = ['tx_nome_uf'];

    public function endereco(): HasMany
    {
        return $this->hasMany(Endereco::class, 'sg_uf', 'sg_uf');
    }
}
