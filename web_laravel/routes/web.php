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

Route::get('/', [
	'as'=>'home',
	'uses'=>'MainController@getHome'
]);

Route::get('/home', [
	'as'=>'home',
	'uses'=>'MainController@getHome'
]);

Route::get('/predict', [
	'as'=>'predict',
	'uses'=>'MainController@getPredict'
]);


Route::get('/search', [
	'as'=>'search',
	'uses'=>'MainController@getSearch'
]);


Route::get('/disease', [
	'as'=>'disease_info',
	'uses'=>'MainController@getDisease'
]);

Route::get('/predict_disease', [
	'as'=>'disease_info',
	'uses'=>'MainController@getPredictResult'
]);

// Route::get('/predict_disease', function(){
// 	echo "dfa";
// });

Route::post('/predict_disease', [
	'as'=>'disease_info',
	'uses'=>'MainController@getPredictResult'
]);


Route::get('/account', [
	'as'=>'account',
	'uses'=>'MainController@getAccount'
]);


