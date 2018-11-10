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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SearchController@index');
Route::get('/course', 'SearchController@courses');
Route::get('/search/users', 'SearchController@users');
Route::get('/filter', 'SearchController@filter');
Route::get('/course/filterByInterest', 'SearchController@filterByInterest');

// Specific routes to UserController resource controller
Route::resource('users', 'UserController');
Route::get('/users/{user_id}/remove/{course_id}','UserController@removeCourse');
Route::post('/users/{user_id}/add','UserController@addCourse');


Route::resource('friendships', 'FriendshipController');
Route::post('/confirm-friendship', 'FriendshipController@confirm');
Route::post('/remove-friendship', 'FriendshipController@unfriend');
