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
Route::resource('cuisine', 'CuisineController');
Route::resource('location', 'LocationController');
Route::resource('calendar', 'CalendarController', ['except' => ['create', 'edit', 'update', 'store', 'destroy']]);

Route::resource('visit', 'VisitController', ['except' => 'create']);
Route::get('visit/{visit}/create', 'VisitController@create');

Route::resource('pick', 'PickController', ['except' => ['create', 'show', 'edit', 'update', 'destroy']]);
