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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Signup','AuthController@signupcreare');
Route::post('/Login','AuthController@Login');

Route::middleware('auth:api')->group( function () {
  
    Route::post('/TrustAdd','TrustController@trustdatainsert');
  
});
 


