<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Drogaria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    private $produtos;
    private $categorias;
    private $drogarias;

    public function __construct()
    {
        $this->produtos = new Produto();
        $this->categorias = new Categorias();
        $this->drogarias = new Drogaria();
    }

    public function index()
    {
        return view('produtos.index', ['produtos' => $this->produtos->all()]);
    }

    public function register()
    {
        return view('produtos.core', 
        [
            'title' => 'Cadastro de produtos', 
            'subTitle' => 'Tela de cadastro de produto',
            'method' => 'post',
            'categorias' => $this->categorias->all(),
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => null,
            'categoria_id' => null,
            'action' => url('/produtos/create/')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate($this->produtos->rules(), $this->produtos->feedback());

        $this->produtos->create($request->all());
        return redirect()->route('produtos.index')->with('sucesso','Produto cadastrado com sucesso');
    }

    public function show($id)
    {
        $produto = $this->produtos->find($id);
        $drogaria = $this->drogarias->find($produto->drogaria_id);
        $categoria = $this->categorias->find($produto->categoria_id);

        if($produto == null){
            return redirect()->route('produtos.index')->with('erros','Produto não encontrado');
        }
        
        return view('produtos.single', ['produto' => $produto, 'categoria' => $categoria->nome, 'drogaria' => $drogaria->nome]);
    }

    public function edit($id)
    {
        $produto = $this->produtos->find($id);
        return view('produtos.core', 
        [
            'title' => 'Editando produto', 
            'subTitle' => 'Tela de edição de produto',
            'method' => 'post',
            'categorias' => $this->categorias->all(),
            'drogarias' => $this->drogarias->all(),
            'drogaria_id' => $produto->drogaria_id,
            'categoria_id' => $produto->categoria_id,
            'action' => url('/produtos/update/'), 
            'produto' => $produto
        ]);
    }

    public function update(Request $request)
    {
        $produto = $this->produtos->find($request->id);

        $request->validate($this->produtos->rules(), $this->produtos->feedback());

        $produto->update($request->all());
        return redirect()->route('produtos.index')->with("sucesso", "Produto atualizado com sucesso");
    }

    public function delete($id)
    {
        $produto = $this->produtos->find($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with("sucesso", "Produto excluído com sucesso");
    }
}
