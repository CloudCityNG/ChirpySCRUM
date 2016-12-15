<?php

/*
|--------------------------------------------------------------------------
| Service Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function() {

    Route::group(['prefix' => 'tasks'], function()
    {
        $controller = 'TodoController@';

        // The controllers live in src/Services/TodoApi/Http/Controllers

        Route::get('/{id}', [
            'uses'  => "{$controller}show",
            'as'    => 'tasks.index'
        ]);

        Route::get('/', [
            'uses'  => "{$controller}index",
            'as'    => 'tasks.index'
        ]);

        Route::post('/store', "{$controller}store");
        Route::delete('/delete/{id}', "{$controller}destroy");

    });
});
