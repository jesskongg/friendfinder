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


Route::get('/friends', function () {
    $friends = ['Jason', 'Jun', 'Nima', 'Kyle'];
    return view('friendslist', ['friends' => $friends]);
});

Route::get('/', 'SearchController@index');
Route::get('/course', 'SearchController@courses');
Route::get('/search/users', 'SearchController@users');
Route::get('/filter', 'SearchController@filter');
Route::get('/course/filterByInterest', 'SearchController@filterByInterest');

Auth::routes();

Route::resource('users', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('friendships', 'FriendshipController');