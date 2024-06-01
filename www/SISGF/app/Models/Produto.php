<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome','descricao','categoria_id','tipo_produto','codigo','quantidade','preco','drogaria_id'];

    public function rules(){
        return [
            'nome' => "required|min:3|max:40",
            'descricao' => 'required|min:5|max:2000',
            'categoria_id' => 'required',
            'tipo_produto' => 'required',
            'codigo' => 'required|min:5|max:30|numeric',
            'quantidade' => 'required',
            'preco' => 'required',
            'drogaria_id' => 'required'
        ];
    }

    public function feedback(){
        return [
            "required" => "O campo :attribute é obrigatório",
            "nome.min" => "O campo nome precisa ter mais que 2 caracteres",
            "nome.max" => "O campo nome atingiu o limite de 40 digitos",
            "codigo.numeric" => "O codigo deve ser apenas números",
            "codigo.min" => "O campo codigo não atingiu a quantidade minima: 5",
            "codigo.max" => "O campo codigo atingiu o limite de 30 digitos",
            "descricao.min" => "O campo descrição não atingiu a quantidade minima: 5",
            "descricao.max" => "O campo descrição atingiu o limite de 2000 digitos",
        ];
    }
}
