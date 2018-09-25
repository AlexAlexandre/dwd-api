<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected   $table      = 'tb_uf';
    protected   $primaryKey = 'sg_uf';
    public      $incrementing = false;

    protected $fillable = ['tx_nome_uf'];
}
