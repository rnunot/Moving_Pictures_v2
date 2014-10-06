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

//admin routes

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

Route::post('admin/get_users_table', ['as' => 'admin.get_users_table', 'uses' => 'admin\adminController@get_users_table']);

Route::get('admin/impersonate/{id}', ['as' => 'admin.impersonate', 'uses' => 'admin\adminController@impersonate']);

Route::get('admin/de-impersonate/{id}', ['as' => 'admin.de_impersonate','uses' => 'admin\adminController@deImpersonate']);

// Profile routes

Route::get('user/{id?}', ['as']);

Route::get('user/{id?}', array('as' => 'profile.display', 'before' => 'auth', 'uses' => 'profile\ProfileController@show'));

// Confide routes

Route::get('register', array('as' => 'users.register', 'uses' => 'UsersController@create'));

Route::post('users', ['as' => 'users.store', 'uses' => 'UsersController@store']);

Route::get('login', array('as' => 'users.login', 'uses' => 'UsersController@login'));

Route::post('login', ['as' => 'users.do_login', 'uses' => 'UsersController@doLogin']);

Route::get('confirm/{code}', array('as' => 'users.confirm', 'uses' => 'UsersController@confirm'));

Route::get('forgot_password', array('as' => 'users.forgot_password', 'uses' => 'UsersController@forgotPassword'));

Route::post('forgot_password', ['as' => 'users.do_forgot_password', 'uses' => 'UsersController@doForgotPassword']);

Route::get('reset_password/{token}', array('as' => 'users.reset_password', 'uses' => 'UsersController@resetPassword'));

Route::post('reset_password', ['as' => 'users.do_reset_password', 'uses' => 'UsersController@doResetPassword']);

Route::get('logout', array('as' => 'users.logout', 'uses' => 'UsersController@logout'));
