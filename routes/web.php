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

// static pages
Route::get('/', 'ThreadsController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

//Registration routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);

//Authentication Routes...
Route::get('logout', 'Auth\LoginController@logout');

//Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@doLogin');

//Forgot password routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/', 'ThreadsController@index');

Route::resource('thread', 'ThreadsController');

Route::resource('comment', 'CommentsController');

<<<<<<< HEAD
Route::resource('tag', 'TagsController');

Route::post('thread/{$id}/lock', 'ThreadsController@lock')->middleware('auth');

Route::get('profile', function(){
    return view('user.profile');
});
=======
Route::resource('user','UserController');
>>>>>>> ad917b6466b7da7c061adcdb69dbd6899e2fedb0
