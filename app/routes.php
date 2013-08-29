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

Route::get('my/offers', 'MyController@offers');
Route::get('my/items', 'MyController@items');

Route::get('offers/accept/{id}', 'OffersController@accept');
Route::get('offers/reject', 'OffersController@reject');

Route::get('items/{id}/{tab}', 'ItemsController@show');
Route::controller('users', 'UserController');

Route::resource('groups', 'GroupController');

Route::resource('items', 'ItemsController');

Route::resource('categories', 'CategoriesController');

Route::resource('settings', 'SettingsController');

Route::resource('motds', 'MotdsController');

Route::resource('notifications', 'NotificationsController');

Route::resource('templates', 'TemplatesController');

Route::resource('offers', 'OffersController');

Route::resource('feedback', 'FeedbacksController');

Route::resource('jobs', 'JobsController');