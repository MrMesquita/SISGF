<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemCompra extends Model
{
    use HasFactory;

    public function compra(){
        return $this->belongsTo(Compra::class);
    }
}
