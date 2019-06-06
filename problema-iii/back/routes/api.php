<?php

use Illuminate\Http\Request;

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

Route::group(['middleware'=>'cors'], function(){
    Route::get('/',function(){
        return ['message'=>'You are welcome'];
    });
    Route::post('login','\App\Modules\General\Users\Controllers\UsersController@login');
});

/**
* Module Users
*/
Route::apiResource("users","\App\Modules\General\Users\Controllers\UsersController");
/**
* Module BaseCep
*/
Route::apiResource("base_cep","\App\Modules\General\BaseCep\Controllers\BaseCepController");