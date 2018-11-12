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
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
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

// Specific routes to UserController resource controller
// The proceeding routes can be replaced by the single line: Route::resource('users', 'UserController');
// Route::put('/users/{id}', 'UserController@update');
// Route::get('/users/{id}', 'UserController@show');
// Route::get('/users/{id}',[
//     'as' => 'users.show',
//     'uses' => 'UserController@show'
// ]);
// Route::get('/users/{id}/edit', 'UserController@edit');

?>
