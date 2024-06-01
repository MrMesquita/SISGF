<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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