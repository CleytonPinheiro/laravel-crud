<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes', 'index')->name('clientes.index');
    Route::post('/clientes', 'store')->name('clientes.store');
    Route::delete('/clientes/{id}', 'destroy')->name('clientes.destroy');
    Route::get('/cliente/{id}', 'show')->name('cliente.show');
    Route::put('/cliente/{id}', 'update')->name('cliente.update');
});

Route::controller(ProdutosController::class)->group(function () {
    Route::get('/produtos', 'index')->name('produtos.index');
    Route::post('/produtos', 'store')->name('produtos.store');
    Route::delete('/produto/{id}', 'destroy')->name('produto.destroy');
    Route::get('/produto/{id}', 'show')->name('produto.show');
    Route::put('/produto/{id}', 'update')->name('produto.update');
});