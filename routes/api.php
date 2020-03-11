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


Route::group(['middleware' => ['cors','jwt.verify']], function () {
    
});



Route::apiResource('categoria', 'CategoriaController');
Route::apiResource('fabricante', 'FabricanteController');
Route::apiResource('fornecedor', 'FornecedorController');
Route::apiResource('produto', 'ProdutoController');
Route::apiResource('imagem', 'ImagemController');


Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::put('register/{id}', 'AuthController@update');
Route::get('me', 'AuthController@me');
