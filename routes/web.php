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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('layouts.app');
// });

// Routes for admin users
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

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

// credit
Route::get('/credits', function() {
    return view('credits');
});

?>
