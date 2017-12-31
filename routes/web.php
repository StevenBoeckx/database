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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::post('/api/login', 'AuthenticateController@authenticate');
Route::post('/api/signup', 'AuthenticateController@adduser');
Route::get('/api/sensors', 'sensorRequest@getSensors');
Route::get('/api/admindatamanagement', 'admindatamanagement@getSensorData');
Route::post('/api/admindatamanagement', 'admindatamanagement@addSensorData');
Route::delete('/api/admindatamanagement/{id}', 'admindatamanagement@deleteSensorData');
Route::any('{catchall}', function() {
    return View::make('index');
})->where('catchall','.*');

//Angular stuff
Route::get('/', function() {
	return View::make('index');
});

//
