<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class itemCompra extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['produto_id','compra_id','quantidade','preco_unitario'];

    public function compra(){
        return $this->belongsTo(Compra::class);
    }
}
