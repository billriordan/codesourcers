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
    return view('welcome');
});


// Auth::routes();

Route::get('/home', 'HomeController@index');


//Registration routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);


//Authentication Routes...
Route::get('logout', 'Auth\LoginController@logout');

//Login Routes

Route::get('login', 'Auth\LoginController@showLoginForm');