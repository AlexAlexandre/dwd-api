<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('uf', 'UfController', ['only' => ['index', 'show']]);
Route::resource('fornecedor', 'FornecedorController', ['except' => ['create', 'edit']]);
Route::resource('tabela-preco', 'TabelaPrecoController', ['except' => ['create', 'edit']]);
Route::resource('clientes', 'ClientesController', ['except' => ['create', 'edit']]);
Route::get('tipo-servico', 'TabelaPrecoController@listarTipoServico');
