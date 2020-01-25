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

Route::get('/teste', 'Api\VeiculoController@status');

Route::namespace('Api')->group(function(){
    Route::post('/veiculo/add', 'VeiculoController@add');
    Route::get('/veiculo/list', 'VeiculoController@list');
    Route::get('/veiculo/search', 'VeiculoController@search');
    Route::get('/veiculo/{id}', 'VeiculoController@select');
    Route::put('/veiculo/{id}', 'VeiculoController@update');
    Route::delete('/veiculo/{id}', 'VeiculoController@delete');

    Route::post('/acessorio/add', 'AcessorioController@add');
    Route::get('/acessorio/list', 'AcessorioController@list');
    Route::get('/acessorio/{id}', 'AcessorioController@select');
    Route::put('/acessorio/{id}', 'AcessorioController@update');
    Route::delete('/acessorio/{id}', 'AcessorioController@delete');

    Route::post('/categoria/add', 'CategoriaController@add');
    Route::get('/categoria/list', 'CategoriaController@list');
    Route::get('/categoria/{id}', 'CategoriaController@select');
    Route::put('/categoria/{id}', 'CategoriaController@update');
    Route::delete('/categoria/{id}', 'CategoriaController@delete');

    Route::post('/combustivel/add', 'CombustivelController@add');
    Route::get('/combustivel/list', 'CombustivelController@list');
    Route::get('/combustivel/{id}', 'CombustivelController@select');
    Route::put('/combustivel/{id}', 'CombustivelController@update');
    Route::delete('/combustivel/{id}', 'CombustivelController@delete');

    Route::post('/marca/add', 'MarcaController@add');
    Route::get('/marca/list', 'MarcaController@list');
    Route::get('/marca/{id}', 'MarcaController@select');
    Route::put('/marca/{id}', 'MarcaController@update');
    Route::delete('/marca/{id}', 'MarcaController@delete');

    Route::post('/veicacessorio/add', 'VeiculoAcessorioController@add');
    Route::get('/veicacessorio/list', 'VeiculoAcessorioController@list');
    Route::get('/veicacessorio/{id}', 'VeiculoAcessorioController@select');
    Route::put('/veicacessorio/{id}', 'VeiculoAcessorioController@update');
    Route::delete('/veicacessorio/{id}', 'VeiculoAcessorioController@delete');
});
