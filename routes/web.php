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

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Series
Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/create', 'SeriesController@create')
    ->name('form_criar_serie');
Route::post('/series/create', 'SeriesController@store');
Route::post('/series/remover/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/nameEdit', 'SeriesController@nameEdit');

//Seasons
Route::get('/series/{serieId}/seasons', 'SeasonsController@index');

//Episodes
Route::get('/seasons/{season}/episodes', 'EpisodesController@index');
Route::post('/seasons/{season}/episodes/watch', 'EpisodesController@watch');
