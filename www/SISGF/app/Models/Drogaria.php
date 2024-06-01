<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drogaria extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome','CNPJ','rua','bairro','cep','pais','complemento'];
}
