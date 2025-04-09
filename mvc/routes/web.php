<?php

use App\Controllers\UserController;
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
Route::get('/stamp/create', 'StampController@create');
Route::post('/stamp/create', 'StampController@store');

Route::get('/image/create', 'ImageController@create');
Route::post('/image/create', 'ImageController@store');

Route::get('/auction', 'AuctionController@index');
Route::get('/auction/show', 'AuctionController@show');
Route::get('/auction/show', 'BidController@placeBid');

Route::dispatch();
