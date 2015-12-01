<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CalendarController@index');
Route::get('/visit/{date}/create', 'CalendarController@create');
Route::get('/visit/{date}/edit', 'CalendarController@edit');
Route::patch('/visit/{date}/update', 'CalendarController@update');

Route::resource('cuisine', 'CuisineController');

Route::resource('location', 'LocationController');