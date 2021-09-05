<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cadastros', 'CadastrosController@index')
    ->name('listar_cadastros');
Route::get('/cadastros/criar', 'CadastrosController@create')
    ->name('form_criar_cadastro');
Route::post('/cadastros/criar', 'CadastrosController@store');
Route::get('/cadastros/{cadastroId}/editar', 'CadastrosController@editar');
Route::post('/cadastros/{cadastroId}/editar', 'CadastrosController@store');
Route::delete('/cadastros/{id}', 'CadastrosController@destroy');
