<?php

/*
|--------------------------------------------------------------------------
| Agent Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', 'AgentController@index')->name('Agent-Home');
Route::get('/edit/profile','AgentController@editprofile');
Route::post('/update/profile','AgentController@updateprofile');