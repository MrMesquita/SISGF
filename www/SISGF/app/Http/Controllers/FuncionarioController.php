<?php

namespace App\Http\Controllers;

use App\Models\Drogaria;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    private $funcionarios;
    private $drogarias;

    public function __construct()
    {
        $this->funcionarios = new Funcionario();
        $this->drogarias = new Drogaria();
    }

    public function index()
    {
        return view('funcionarios.index', [
            'funcionarios' => $this->funcionarios->all(),
            'drogarias' => $this->drogarias->all(),
        ]);
    }

    public function register()
    {
        return view('funcionarios.core', 
        [
            'title' => 'Cadastro de funcionários', 
            'subTitle' => 'Tela de cadastro de funcionários',
            'method' => 'post',
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => null,
            'action' => url('/funcionarios/create/')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate($this->funcionarios->rules(), $this->funcionarios->feedback());

        $this->funcionarios->create($request->all());
        return redirect()->route('funcionarios.index')->with('sucesso','Funcionário cadastrado com sucesso');
    }

    public function show($id)
    {
        $funcionario = $this->funcionarios->find($id);
        $drogaria = $this->drogarias->find($funcionario->drogaria_id);

        if($funcionario == null){
            return redirect()->route('funcionarios.index')->with('erros','Funcionário não encontrado');
        }
        
        return view('funcionarios.single', ['funcionario' => $funcionario, 'drogaria' => $drogaria->nome]);
    }

    public function edit($id)
    {
        $funcionario = $this->funcionarios->find($id);
        return view('funcionarios.core', 
        [
            'title' => 'Editando funcionário', 
            'subTitle' => 'Tela de edição de funcionário',
            'method' => 'post',
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => $funcionario->drogaria_id,
            'action' => url('/funcionarios/update/'), 
            'funcionario' => $funcionario
        ]);
    }

    public function update(Request $request)
    {
        $funcionario = $this->funcionarios->find($request->id);

        $request->validate($this->funcionarios->rules(), $this->funcionarios->feedback());

        $funcionario->update($request->all());
        return redirect()->route('funcionarios.index')->with("sucesso", "Funcionário atualizado com sucesso");
    }

    public function delete($id)
    {
        $funcionario = $this->funcionarios->find($id);
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with("sucesso", "Funcionário excluído com sucesso");
    }
}
