<?php

use App\Http\Controllers\AtestadoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FarmaceuticoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function() {
    return view('login.login');
})->name('login');

Route::get('logout', function (){
    Auth::logout();
    return redirect()->route('login');
});

Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');


Route::middleware('auth')->group(function(){

    Route::get('/caixa', [CaixaController::class, 'index'])->name('caixa.index');
    Route::post('/caixa/start', [CaixaController::class, 'start'])->name('caixa.start');
    Route::post('/caixa/add', [CaixaController::class, 'add'])->name('caixa.add');
    Route::post('/caixa/getItems', [CaixaController::class, 'getItems'])->name('caixa.getItems');
    Route::post('/caixa/destroyCompra', [CaixaController::class, 'destroyCompra'])->name('caixa.destroyCompra');


    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/register/', [ClienteController::class, 'register'])->name('clientes.register');
    Route::post('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::post('/clientes/update', [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete'])->name('clientes.delete');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/register/', [ProdutoController::class, 'register'])->name('produtos.register');
    Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
    Route::post('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::post('/produtos/update', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::get('/produtos/delete/{id}', [ProdutoController::class, 'delete'])->name('produtos.delete');

    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/register/', [FuncionarioController::class, 'register'])->name('funcionarios.register');
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionarios.show');
    Route::post('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::get('/funcionarios/edit/{id}', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/funcionarios/update', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::get('/funcionarios/delete/{id}', [FuncionarioController::class, 'delete'])->name('funcionarios.delete');

    Route::get('/farmaceuticos', [FarmaceuticoController::class, 'index'])->name('farmaceuticos.index');
    Route::get('/farmaceuticos/register/', [FarmaceuticoController::class, 'register'])->name('farmaceuticos.register');
    Route::get('/farmaceuticos/{id}', [FarmaceuticoController::class, 'show'])->name('farmaceuticos.show');
    Route::post('/farmaceuticos/create', [FarmaceuticoController::class, 'create'])->name('farmaceuticos.create');
    Route::get('/farmaceuticos/edit/{id}', [FarmaceuticoController::class, 'edit'])->name('farmaceuticos.edit');
    Route::post('/farmaceuticos/update', [FarmaceuticoController::class, 'update'])->name('farmaceuticos.update');
    Route::get('/farmaceuticos/delete/{id}', [FarmaceuticoController::class, 'delete'])->name('farmaceuticos.delete');

    Route::get('/atestados', [AtestadoController::class, 'index'])->name('atestados.index');
    Route::get('/atestados/register/', [AtestadoController::class, 'register'])->name('atestados.register');
    Route::get('/atestados/{id}', [AtestadoController::class, 'show'])->name('atestados.show');
    Route::post('/atestados/create', [AtestadoController::class, 'create'])->name('atestados.create');
    Route::get('/atestados/edit/{id}', [AtestadoController::class, 'edit'])->name('atestados.edit');
    Route::post('/atestados/update', [AtestadoController::class, 'update'])->name('atestados.update');
    Route::get('/atestados/delete/{id}', [AtestadoController::class, 'delete'])->name('atestados.delete');
});