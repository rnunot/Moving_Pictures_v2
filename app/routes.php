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
  'uses' =>'admin\adminController@index')
);

Route::get('admin_panel/login' ,array(
  'as'    => 'login',
  'uses'  => 'admin\adminController@login')
);