<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clientes;

    public function __construct()
    {
        $this->clientes = new Cliente();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index', ['clientes' => $this->clientes->all()]);
    }

    public function register()
    {
        return view('clientes.core', 
        [
            'title' => 'Cadastro de cliente', 
            'subTitle' => 'Cadastrando cliente no sistema',
            'method' => 'post',
            'action' => url('/clientes/create/')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate($this->clientes->rules(), $this->clientes->feedback());

        $cliente = $this->clientes->create($request->all());
        return redirect()->route('clientes.index')->with('sucesso','Cliente cadastrado com sucesso');
    }

    public function edit($id)
    {
        $cliente = $this->clientes->find($id);
        return view('clientes.core', 
        [
            'title' => 'Editando cliente', 
            'subTitle' => 'Editando um cliente cadastrado no sistema',
            'method' => 'post',
            'action' => url('/clientes/update/'), 
            'cliente' => $cliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $clientes = new Cliente();
        $cliente = $clientes->find($id)->getAttributes();
        if($cliente == null){
            redirect()->view('clientes.index', ['erros' => 'Cliente não encontrado']);
        }
        
        return view('clientes.single', ['cliente' => $cliente]);
    }

    public function update(Request $request)
    {
        $cliente = $this->clientes->find($request->id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with("sucesso", "Cliente atualizado com sucesso");
    }

    public function delete($id)
    {
        $cliente = $this->clientes->find($id);
        if($cliente == null){
            return redirect()->route('clientes.index')->with('erros','Cliente não encontrado');
        }

        $cliente->delete($id);
        return redirect()->route('clientes.index')->with("sucesso","Cliente deletado com sucesso");
    }
}
