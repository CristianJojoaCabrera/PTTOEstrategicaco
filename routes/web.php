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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/home', 'HomeController@index')
    ->name('home');
Route::group(['prefix' => 'funcionarity'],function(){
    Route::get('/funcionarity_index', 'FuncionarityController@funcionarity_index')
        ->name('funcionarity_index');
    Route::get('/funcionarity', 'FuncionarityController@funcionarity')
        ->name('funcionarity');
    Route::post('/save_funcionarity', 'FuncionarityController@save_funcionarity')
        ->name('save_funcionarity');
    Route::get('/funcionarity_table', 'FuncionarityController@funcionarity_table')
        ->name('funcionarity_table');

});
Route::group(['prefix' => 'PptoSales'],function(){
    Route::get('/ppto_sale/{id_funcionarity}', 'PptoSalesController@ppto_sale')
        ->name('ppto_sale');
});
;
Auth::routes();