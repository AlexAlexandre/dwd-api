<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspacosSalas extends Model
{
    protected $table = 'tb_espacos_sala';
    protected $primaryKey = 'id_espacos_sala';

    protected $fillable = [
        'id_espacos',
        'id_salas'
    ];

    public function espacos(): BelongsTo
    {
        return $this->belongsTo(Espacos::class, 'id_espacos', 'id_espacos');
    }

    public function salas(): BelongsTo
    {
        return $this->belongsTo(Salas::class, 'id_salas', 'id_salas');
    }
}
