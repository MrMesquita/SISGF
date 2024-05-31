<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drogaria extends Model
{
    use HasFactory;
    protected $fillable = ['nome','CNPJ','rua','bairro','cep','pais','complemento'];
}
