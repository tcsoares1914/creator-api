<?php

use Illuminate\Http\Request;

Route::get('/', 'PingController@pong');

Route::prefix('networks')->group(function () {
    Route::get('/', 'NetworkController@default');
    Route::post('/', 'NetworkController@create');
    Route::get('/{networkId}/', 'NetworkController@read');
    Route::put('/{networkId}/', 'NetworkController@update');
    Route::delete('/{networkId}/', 'NetworkController@delete');
});