<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['cliente_id','codigo_funcionario','dt_compra','tipo_pagamento','valor_total'];
}
