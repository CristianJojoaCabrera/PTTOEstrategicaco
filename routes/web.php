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

Route::get('/auspiciadores', 'AuspiciadorController@index')
    ->name('auspiciadores');
Route::get('/auspiciadores_tabla', 'AuspiciadorController@auspiciadores_tabla')
            ->name('auspiciadores_tabla');
Route::get('/resulatos_prospecto/{id_auspiciador?}', 'AuspiciadorController@resulatos_prospecto')
    ->name('resulatos_prospecto');

Route::get('/prospectos', 'ProspectoController@index')
    ->name('prospectos');
Route::get('/prospectos_tabla', 'ProspectoController@prospectos_tabla')
                ->name('prospectos_tabla');
Route::get('/detalles_prospecto/{id_prospecto?}', 'ProspectoController@detalles_prospecto')
                ->name('detalles_prospecto');
Route::get('/estado_prospecto/{id_prospecto?}', 'ProspectoController@estado_prospecto')
    ->name('estado_prospecto');
Route::post('/editar_prospecto/{id_prospecto?}', 'ProspectoController@editar_prospecto')
    ->name('editar_prospecto');

Route::get('/trazabilidad_tabla/{id_prospecto?}', 'TrazabilidadController@trazabilidad_tabla')
    ->name('trazabilidad_tabla');

Route::get('/auspiciador_prospecto/{id_auspiciador?}', 'AuspiciadorController@auspiciador_prospecto')
    ->name('auspiciador_prospecto');
Route::get('/prospectos_auspiciador_tabla/{id_auspiciador?}', 'AuspiciadorController@prospectos_auspiciador_tabla')
    ->name('prospectos_auspiciador_tabla');
Route::get('/auspiciador_prospectos_detalles/{id_prospecto?}', 'AuspiciadorController@auspiciador_prospectos_detalles')
    ->name('auspiciador_prospectos_detalles');


Auth::routes();