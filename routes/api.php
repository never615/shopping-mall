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

Route::prefix('v1')->namespace('Api')->name('api.v1.')->group(function () {
    Route::get('version', function (){
        return 'this is version 1';
    });
    Route::middleware('throttle:'.config('api.rate_limits.sign'))
        ->group(function (){
            Route::post('authorizations','AuthorizationsController@store')
                ->name('authorizations.store');

            Route::post('users', 'UsersController@store')
                ->name('users.store');
        });
});