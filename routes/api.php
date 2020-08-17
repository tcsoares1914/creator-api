<?php

Route::get('/', 'PingController@pong');

Route::prefix('networks')->group(function () {
    Route::get('/', 'NetworkController@default');
    Route::post('/', 'NetworkController@create');
    Route::get('/{networkId}/', 'NetworkController@read');
    Route::put('/{networkId}/', 'NetworkController@update');
    Route::delete('/{networkId}/', 'NetworkController@delete');
});

Route::prefix('creators')->group(function () {
    Route::get('/', 'CreatorController@default');
    Route::post('/', 'CreatorController@create');
    Route::get('/{creatorId}/', 'CreatorController@read');
    Route::put('/{creatorId}/', 'CreatorController@update');
    Route::delete('/{creatorId}/', 'CreatorController@delete');
});
