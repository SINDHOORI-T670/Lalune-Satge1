<?php

/*
|--------------------------------------------------------------------------
| Broker Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', 'BrokerController@index')->name('Broker-Home');
Route::get('/edit/profile','BrokerController@editprofile');
Route::post('/update/profile','BrokerController@updateprofile');