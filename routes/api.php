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

Route::apiResource('clientes', 'ClienteController');
Route::apiResource('categorias', 'CategoriaController');
Route::apiResource('fabricantes', 'FabricanteController');
Route::apiResource('fornecedores', 'FornecedorController');
Route::apiResource('armazenamentos', 'LocalArmazenamentoController');
Route::apiResource('produtos', 'ProdutoController');
Route::apiResource('imagens', 'ImagemController');
Route::apiResource('usuarios', 'UserController');

Route::post('register', 'AuthController@register');
Route::put('register/{id}', 'AuthController@update');
Route::get('me', 'AuthController@me');
Route::post('login', 'AuthController@login');
