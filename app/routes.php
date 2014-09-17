<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('hello', function()
{
	return View::make('hello');
});


Route::get('/', array(
  'as' => 'home',
  function()
  {
  	return View::make('home');
  })
);

Route::get('movies', array(
  'as'  => 'movies',
  'before' => '',
  'uses' => 'MoviesController@index')
);

Route::get('admin_panel', array(
  'as' => 'admin',
  'uses' =>'admin\adminController@display')
);

Route::get('admin_panel/login' ,array(
  'as'    => 'login',
  'uses'  => 'admin\adminController@login')
);

Route::get('admin_panel/{page}', array(
  'as'    => 'admin.display',
  'uses'  => 'admin\adminController@display')
);

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
