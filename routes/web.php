<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {return view('login');});
Route::get('/reg', function() {return view('registration');});

Route::post('/insert','loginController@insert');
Route::post('/resister','loginController@resister');
Route::get('/logout','loginController@logout');

// Authentication Applied
Route::get('/dashboard', function(){return view('dashboard');})->middleware('loginCheck');

//File Mannagement...
Route::post('/fileInsert', 'fileController@fileInsert');
Route::get('/retriveFile', 'fileController@retriveFile');







//Authentication Middleware Practice With API Token....
Route::get('/dashboard/nazmul/{token}', function(){
	return "<h1>Authentication Successfull</h1>";
})->middleware('check');
