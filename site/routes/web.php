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



Route::get('/', 'StartController@index')->name('start');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teams', 'TeamsController@index')->name('teams');;
Route::get('/team/stats/{n}', 'TeamsController@show')->where('n', '[0-9]+')->name('team-stats');
Route::get('/players', 'PlayersController@index')->name('players');
Route::get('/player/{n}', 'PlayersController@show')->where('n', '[0-9]+')->name('player');
Route::get('/matchs/', 'MatchsController@index')->name('list-matchs');
Route::get('/match/{n}', 'MatchsController@show')->where('n', '[0-9]+')->name('match');

Route::middleware('admin')->group(function () {

    Route::get('teams/add', 'TeamsController@create')->name('add-team');
    Route::post('teams/add', 'TeamsController@store');

    Route::get('players/add', 'PlayersController@create')->name('add-player');
    Route::post('players/add', 'PlayersController@store');
    Route::get('players/lists/', 'PlayersController@lists')->name('list-player-admin');
    Route::get('players/edit/{n}', 'PlayersController@edit')->where('n', '[0-9]+')->name('edit-player');
    Route::post('players/edit/{n}', 'PlayersController@update')->where('n', '[0-9]+')->name('edit-player');
    Route::get('players/remove/{n}', 'PlayersController@destroy')->where('n', '[0-9]+')->name('remove-player');


    Route::get('match/add', 'MatchsController@create')->name('add-match');
    Route::post('match/add', 'MatchsController@store');

    Route::post('match/configuration', 'MatchsController@configuration');  
    Route::get('match/configuration/{id}', 'MatchsController@configuration')->name('configuration-match');
    Route::post('match/configuration/{id}', 'MatchsController@update')->name('update-match');

    
 });
