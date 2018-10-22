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

Route::get('/friends', function () {
    $friends = ['Jason', 'Jun', 'Nima', 'Kyle'];
    return view('friendslist', ['friends' => $friends]);
});

Route::get('/search', 'SearchController@index');
Route::get('/filter', 'SearchController@filter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
