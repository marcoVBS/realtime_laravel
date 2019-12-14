<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('chat', 'Chat\ChatController@index')->name('chat');
    Route::post('chat/message', 'Chat\ChatController@store');
    Route::get('chat/messages', 'Chat\ChatController@messages');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
