<?php

namespace App\Http\Controllers;

use App\Models\Atestado;
use App\Models\Cliente;
use App\Models\Farmaceutico;
use Illuminate\Http\Request;

class AtestadoController extends Controller
{
    private $atestados;
    private $clientes;
    private $farmaceuticos;

    public function __construct()
    {
        $this->atestados = new Atestado();
        $this->clientes = new Cliente();
        $this->farmaceuticos = new Farmaceutico();
    }

    public function index()
    {
        return view('atestados.index', [
            'atestados' => $this->atestados->all(),
            'clientes' => $this->clientes,
            'farmaceuticos' => $this->farmaceuticos,
        ]);
    }

    public function register()
    {
        return view('atestados.core', 
        [
            'title' => 'Cadastro de atestado', 
            'subTitle' => 'Tela de cadastro de atestado',
            'method' => 'post',
            'clientes' => $this->clientes->all(),
            'farmaceuticos' => $this->farmaceuticos->all(),
            'cliente_id' => null,
            'farmaceutico_id' => null,
            'action' => url('/atestados/create/')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate($this->atestados->rules(), $this->atestados->feedback());

        $this->atestados->create($request->all());
        return redirect()->route('atestados.index')->with('sucesso','Atestado cadastrado com sucesso');
    }

    public function show($id)
    {
        $atestado = $this->atestados->find($id);
        $cliente = $this->clientes->find($atestado->cliente_id);

        if($atestado == null){
            return redirect()->route('atestados.index')->with('erros','Atestado não encontrado');
        }
        
        return view('atestados.single', ['atestado' => $atestado, 'cliente_id' => $cliente]);
    }

    public function edit($id)
    {
        $atestado = $this->atestados->find($id);
        $cliente = $this->clientes->find($atestado->cliente_id);
        $farmaceutico = $this->farmaceuticos->find($atestado->farmaceutico_id);
        return view('atestados.core', 
        [
            'title' => 'Editando atestado', 
            'subTitle' => 'Tela de edição de atestado',
            'method' => 'post',
            'clientes' => $this->clientes->all(),
            'cliente_id' => $cliente,
            'farmaceuticos' => $this->farmaceuticos->all(),
            'farmaceutico_id' => $farmaceutico,
            'action' => url('/atestados/update/'), 
            'atestado' => $atestado
        ]);
    }

    public function update(Request $request)
    {
        $atestado = $this->atestados->find($request->id);

        $request->validate($this->atestados->rules(), $this->atestados->feedback());

        $atestado->update($request->all());
        return redirect()->route('atestados.index')->with("sucesso", "atestado atualizado com sucesso");
    }

    public function delete($id)
    {
        $atestado = $this->atestados->find($id);
        $atestado->delete();
        return redirect()->route('atestados.index')->with("sucesso", "atestado excluído com sucesso");
    }
}
