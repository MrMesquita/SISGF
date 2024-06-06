<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Funcionario;
use App\Models\itemCompra;
use App\Models\Produto;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private $itemCompra;
    private $compras;
    private $produtos;
    private $funcionarios;
    private $clientes;

    public function __construct(){
        $this->itemCompra = new itemCompra();
        $this->compras = new Compra();
        $this->produtos = new Produto();
        $this->funcionarios = new Funcionario();
        $this->clientes = new Cliente();
    }
    
    public function index(){
        return view('caixa.index');
    }

    public function start(Request $request){
        $cliente = $this->clientes->where("documento", $request->cliente)->first();
        $funcionario = $this->funcionarios->where("codigo",$request->funcionario)->first();

        if($cliente == null){
            return response()->json(['message'=>'Cliente não encontrado'],404);
        }else if($funcionario == null){
            return response()->json(['message'=>'Funcionário não encontrado'],404);
        }

        $compra = $this->compras->create(['cliente_id'=>$cliente->id,'codigo_funcionario'=>$funcionario->codigo,'dt_compra'=>now()]);
        session_start();
        return response()->json(['compra_id'=>$compra->id],200);
    }

    public function add(Request $request){
        $produto = $this->produtos->where("codigo",$request->codigo)->first();

        if($produto == null){
            return response()->json(['message'=>'Produto não encontrado'],404);
        }

        $this->itemCompra->create([
            'produto_id'=>$produto->id,
            'compra_id'=>$request->compra_id,
            'quantidade'=>'1',
            'preco_unitario'=>$produto->preco
        ]);

        return response()->json([$produto],200);
    }

    public function getItems(Request $request){
        $items = $this->itemCompra->all()->where("compra_id",$request->compra_id);
        $newItems = [];

        foreach($items as $item){
            $produto = Produto::find($item->produto_id);

            $newItem = [
                'id' => $item->id,
                'produto_id' => $item->produto_id,
                'compra_id' => $item->compra_id,
                'quantidade' => $item->quantidade,
                'preco_unitario' => $item->preco_unitario,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'deleted_at' => $item->deleted_at,
                'produto_nome' => $produto->nome,
                'codigo' => $produto->codigo,
                'tipo' => $produto->tipo_produto
            ];
        
            $newItems[] = $newItem;
        }
        return response()->json($newItems, 200);
    }

    public function destroyCompra(Request $request){
        $items = $this->itemCompra->all()->where("compra_id",$request->compra_id);
        foreach($items as $item){
            $item->forceDelete();
        }

        $this->compras->find($request->compra_id)->forceDelete();
    }
}
