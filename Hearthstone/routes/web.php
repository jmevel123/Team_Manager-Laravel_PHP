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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/users', 'UserController')->middleware('admin');
Route::resource('admin/matchs', 'MatchsController')->middleware('admin');
Route::resource('admin/teams', 'TeamsController')->middleware('admin');
Route::resource('admin/players', 'PlayersController')->middleware('admin');
Route::resource('admin/bets', 'BetsController')->middleware('admin');

Route::get('/profile','UserController@myProfile');


