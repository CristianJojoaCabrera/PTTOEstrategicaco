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

});
Auth::routes();