<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
  });

Route::group(['middleware' => ['auth.player']], function() {
     Route::get('useItem', 'ProfileController@useItem');
     Route::get('unuseItem', 'ProfileController@unuseItem');
     Route::get('allItem', 'ProfileController@allItem');
     Route::get('buyItem/{id}', 'ProfileController@buyItem');
     Route::post('updateuseitem', 'ProfileController@updateuseitem');
  });
