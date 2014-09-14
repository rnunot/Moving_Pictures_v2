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

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('home', array(
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

Route::group(array('prefix' => '', 'before' => ''), function() {
  Route::get('admin', array(
    'as' => 'admin',
    'uses' =>'admin\adminController@index')
  );
});