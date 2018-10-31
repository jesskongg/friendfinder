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
Auth::routes();

Route::get('/', 'SearchController@index');
Route::get('/course', 'SearchController@courses');
Route::get('/search/users', 'SearchController@users');
Route::get('/filter', 'SearchController@filter');
Route::get('/course/filterByInterest', 'SearchController@filterByInterest');

Route::get('/home', 'HomeController@index')->name('home');

// Specific routes to UserController resource controller
// The proceeding routes can be replaced by the single line: Route::resource('users', 'UserController');
Route::put('/users/{id}', 'UserController@update');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}',[
    'as' => 'users.show',
    'uses' => 'UserController@show'
]);
Route::get('/users/{id}/edit', 'UserController@edit');
