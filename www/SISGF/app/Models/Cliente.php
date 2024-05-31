<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nome',
        'email',
        'documento',
        'rua',
        'bairro',
        'cidade',
        'cep',
        'pais',
        'complemento'
    ];
    
    
    public function rules(){
        return [
            'nome' => 'required|min:3|max:30',
            'email' => 'email',
            'documento' => 'required|unique:clientes|min:11|max:11',
            'rua' => 'required|min:4|max:30',
            'bairro' => 'required|min:4|max:30',
            'cidade' => 'required|min:4|max:30',
            'cep' => 'required|min:8|max:8',
            'pais' => 'required|min:5|max:30',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O nome deve ter no minimo 2 caracteres',
            'nome.max' => 'O nome deve ter no máximo 30 caracteres',
            'email' => 'O email deve ser válido',
            'documento.unique' => 'Esse documento já está cadastrado no nosso sistema',
            'min' => 'O campo :attribute não atingiu o minimo de caracteres',
            'max' => 'O campo :attribute antigiu o máximo permitido',
        ];
    }

}