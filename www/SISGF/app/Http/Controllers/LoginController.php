<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ],[
            'email.required' => 'O campo email é Obrigatório',
            'email.email' => 'O email não é valido',
            'password.required' => 'Senha é obrigatório'
        ]);

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('clientes.index');
        }else{
            return redirect()->route('login')->with('errors', 'Usuário e/ou senha inválidos');
        }
    }
}
