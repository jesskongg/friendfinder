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

// meetups
Route::resource('meetups', 'MeetupController');
// TODO: remove these routes after implementing them
Route::get('/meetups', 'MeetupController@index');
Route::post('/meetups', 'MeetupController@store');
Route::delete('/meetups', 'MeetupController@destroy');

Route::group(['prefix' => 'messages'], function () {
  Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
  Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
  Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
  Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
  Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

?>
