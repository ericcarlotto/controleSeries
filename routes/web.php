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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Series
Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/create', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('auth');
Route::post('/series/create', 'SeriesController@store')
    ->middleware('auth');
Route::post('/series/remover/{id}', 'SeriesController@destroy')
    ->middleware('auth');
Route::post('/series/{id}/nameEdit', 'SeriesController@nameEdit')
    ->middleware('auth');
//Seasons
Route::get('/series/{serieId}/seasons', 'SeasonsController@index');

//Episodes
Route::get('/seasons/{season}/episodes', 'EpisodesController@index');
Route::post('/seasons/{season}/episodes/watch', 'EpisodesController@watch')
    ->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Autentication
Route::get('/getin', 'GetInController@index');
Route::post('/getin', 'GetInController@getIn');

//Register
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

//Logout
Route::get('/logout', function () {
   Auth::logout();
   return redirect('/getin');
});
