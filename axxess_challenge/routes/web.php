<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', 'PatientsController@index');

Route::get('signup', 'PatientsController@signup');

Route::post('signup', 'PatientsController@store');

Route::get('visit', 'PatientsController@visit');

Route::post('visit', 'PatientsController@storeVisit');

Route::get('upcoming', 'PatientsController@upcoming');

Route::get('missed', 'PatientsController@missed');

Route::get('record_followup', 'PatientsController@record_followup');


