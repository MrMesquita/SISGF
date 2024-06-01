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
        return view('funcionarios.index', ['funcionarios' => $this->funcionarios->all()]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
