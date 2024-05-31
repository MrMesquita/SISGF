<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmaceutico extends Model
{
    use HasFactory;
    protected $fillable = ['nome','documento','telefone','codigo','CRF','drogaria_id'];
}
