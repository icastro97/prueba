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

Route::post('register', [AuthController::class, 'store'])
       ->name('user.store');
Route::post('login', [AuthController::class, 'login'])
       ->name('user.login');

       Route::group(['middleware'=>'auth:api'], function(){

        Route::get('endpoint1/{id}', 'apiPrueba@endpoint1')->name('endpoint1');
        Route::get('endpoint2', 'apiPrueba@endpoint2')->name('endpoint2');

        Route::get('logout', 'Auth\AuthController@logout');
          
      });