<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/register', [ClienteController::class, 'register'])->name('clientes.register');
Route::post('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/update', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete'])->name('clientes.delete');