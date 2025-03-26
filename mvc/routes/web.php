<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UseController;
use App\Routes\Route;

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();