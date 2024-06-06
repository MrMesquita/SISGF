<?php

namespace App\Http\Controllers;

use App\Models\Drogaria;
use App\Models\Farmaceutico;
use App\Models\User;
use Illuminate\Http\Request;

class FarmaceuticoController extends Controller
{
    private $farmaceuticos;
    private $drogarias;

    public function __construct()
    {
        $this->farmaceuticos = new Farmaceutico();
        $this->drogarias = new Drogaria();
    }

    public function index()
    {
        return view('farmaceuticos.index', [
            'farmaceuticos' => $this->farmaceuticos->all(),
            'drogarias' => $this->drogarias->all(),
        ]);
    }

    public function register()
    {
        return view('farmaceuticos.core', 
        [
            'title' => 'Cadastro de farmacêutico', 
            'subTitle' => 'Tela de cadastro de farmacêutico',
            'method' => 'post',
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => null,
            'action' => url('/farmaceuticos/create/')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate($this->farmaceuticos->rules(), $this->farmaceuticos->feedback());

        $farmaceutico = $this->farmaceuticos->create($request->all());
        User::create(['name'=>$farmaceutico->nome,'email'=> $farmaceutico->codigo.'@sisgf.com','password'=> $farmaceutico->codigo]);
        return redirect()->route('farmaceuticos.index')->with('sucesso','Farmacêutico cadastrado com sucesso');
    }

    public function show($id)
    {
        $farmaceutico = $this->farmaceuticos->find($id);
        $drogaria = $this->drogarias->find($farmaceutico->drogaria_id);

        if($farmaceutico == null){
            return redirect()->route('farmaceuticos.index')->with('erros','Farmacêutico não encontrado');
        }
        
        return view('farmaceuticos.single', ['farmaceutico' => $farmaceutico, 'drogaria' => $drogaria->nome]);
    }

    public function edit($id)
    {
        $farmaceutico = $this->farmaceuticos->find($id);
        return view('farmaceuticos.core', 
        [
            'title' => 'Editando farmacêutico', 
            'subTitle' => 'Tela de edição de farmacêutico',
            'method' => 'post',
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => $farmaceutico->drogaria_id,
            'action' => url('/farmaceuticos/update/'), 
            'farmaceutico' => $farmaceutico
        ]);
    }

    public function update(Request $request)
    {
        $farmaceutico = $this->farmaceuticos->find($request->id);

        $request->validate($this->farmaceuticos->rules(), $this->farmaceuticos->feedback());

        $farmaceutico->update($request->all());
        return redirect()->route('farmaceuticos.index')->with("sucesso", "Farmacêutico atualizado com sucesso");
    }

    public function delete($id)
    {
        $farmaceutico = $this->farmaceuticos->find($id);
        $farmaceutico->delete();
        return redirect()->route('farmaceuticos.index')->with("sucesso", "Farmacêutico excluído com sucesso");
    }
}
