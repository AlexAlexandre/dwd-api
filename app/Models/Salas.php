<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salas extends Model
{
    protected $table = 'tb_salas';
    protected $primaryKey = 'id_salas';

    protected $fillable = [
        'tx_nome_salas',
        'nr_metragem_salas',
        'nr_altura_pe_direito_salas'
    ];

    public function espacosSala(): HasMany
    {
        return $this->hasMany(EspacosSalas::class, 'id_salas', 'id_salas');
    }

}
