<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('profile','UserController@profile');
Route::post('profile','UserController@update_avatar');
Route::group(['middleware' => ['web']], function() {
    Route::resource('blog','BlogController');
    Route::post ( '/editItem', 'BlogController@editItem' );
    Route::post ( '/addItem', 'BlogController@addItem' );
    Route::post ( '/deleteItem', 'BlogController@deleteItem' );
});
Auth::routes();

Route::get('/home', 'HomeController@index');
