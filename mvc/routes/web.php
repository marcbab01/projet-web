<?php

use App\Controllers\StampController;
use App\Routes\Route;


Route::get('/home', 'HomeController@index');

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/stamp', 'StampController@index');
Route::get('/stamp/show', 'StampController@show');

Route::dispatch();
