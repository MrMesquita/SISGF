<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atestado extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['farmaceutico_id','cliente_id','dt_inicio','dt_fim','diagnostico','descricao'];
    
    public function rules(){
        return [
            'farmaceutico_id' => "required|numeric",
            'cliente_id' => 'required|numeric',
            'dt_inicio' => 'required|date',
            'dt_fim' => 'required|date',
            'diagnostico' => 'required|min:3|max:30',
            'descricao' => 'required|min:5|max:2000',
        ];
    }

    public function feedback(){
        return [
            "required" => "O campo :attribute é obrigatório",
            "diagnostico.min" => "O campo diagnóstico precisa ter mais que 2 caracteres",
            "diagnostico.max" => "O campo diagnóstico atingiu o limite de 30 digitos",
            "numeric" => ":attribute deve ser apenas números",
            "descricao.min" => "O campo descrição não atingiu a quantidade minima: 5",
            "descricao.max" => "O campo descrição atingiu o limite de 2000 digitos",
        ];
    }
}

