<?php

include('routes/Routes.php');

use App\Controllers\UserController;
use App\Routes\Route;

Route::get('/user', 'UserController@index');
Route::get('/user/show', 'UserController@show');