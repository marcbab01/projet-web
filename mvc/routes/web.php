<?php

use App\Controllers\UserController;
use App\Routes\Route;

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::dispatch();