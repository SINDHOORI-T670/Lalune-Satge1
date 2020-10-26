<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

    Route::get('/home', 'AdminController@index')->name('home');
    
    //edit/update for admin profile
    Route::get('/edit/profile','AdminController@editprofile')->name('Edit-Profile');
    Route::post('/update/profile','AdminController@updateprofile')->name('Update-Profile');
    
    //add,edit,update,delete for agents
    Route::get('/agents','AdminController@agentslist')->name('Agent-List');
    Route::get('/add/agent','AdminController@addagent')->name('Add-Agent');
    Route::post('/store/agent','AdminController@storeagent')->name('Store-Agent');
    Route::get('/edit/agent/{id}','AdminController@editagent')->name('Edit-Agent');
    Route::post('/update/agent','AdminController@updateagent')->name('Update-Agent');
    Route::post('/delete/agent/{id}','AdminController@deleteagent')->name('Delete-Agent');
    
    //add,edit,update,delete for brokers
    Route::get('/brokers','AdminController@brokerslist')->name('Broker-List');
    Route::get('/add/broker','AdminController@addbroker')->name('Add-Broker');
    Route::post('/store/broker','AdminController@storebroker')->name('Store-Broker');
    Route::get('/edit/broker/{id}','AdminController@editbroker')->name('Edit-Broker');
    Route::post('/update/broker','AdminController@updatebroker')->name('Update-Broker');
    Route::post('/delete/broker/{id}','AdminController@deletebroker')->name('Delete-Broker');
    
    //add,edit,delete properties
    Route::get('/properties','AdminController@propertylist')->name('Property-List');
    Route::get('/add/property','AdminController@addproperty')->name('Add-Property');
    Route::post('/store/property','AdminController@storeproperty')->name('Store-Property');
    Route::get('/edit/property/{id}','AdminController@editproperty')->name('Edit-Property');
    Route::get('/edit/agent/property/{id}','AdminController@editagentproperty')->name('Edit-Agent-Property');
    Route::get('/edit/broker/property/{id}','AdminController@editbrokerproperty')->name('Edit-Agent-Property');
    Route::post('/update/property','AdminController@updateadminproperty')->name('Update-Property');
    Route::post('/update/agent/property','AdminController@updateagentproperty')->name('Update-Agent-Property');
    Route::post('/update/broker/property','AdminController@updateabrokerproperty')->name('Update-Broker-Property');
    Route::post('/delete/property/{id}','AdminController@deleteproperty')->name('Delete-Property');
    Route::get('/delete/property/speciality/','AdminController@deletepropertyspeciality')->name('Delete-Property-Specialize');
    Route::post('/edit/property/speciality','AdminController@updatepropertyspeciality')->name('Update-Property-Specialize');
    Route::get('/delete/property/image/','AdminController@deletepropertyimage')->name('Delete-Property-Image');
    Route::get('/list/property/base-locations','AdminController@listbaselocation')->name('Base-Location');
    Route::get('/add/property/base-location','AdminController@addbaselocation')->name('Add-Base-Location');
    Route::post('/store/property/base-location','AdminController@storepropertybaselocation')->name('Store-Base-Location');
    Route::get('/property/locations','AdminController@propertylocations')->name('Property-Location-List');
    Route::get('/add/property/location','AdminController@addpropertylocation')->name('Add-Property-Location');
    Route::post('/store/property/location','AdminController@storepropertylocation')->name('Store-Property-Location');
    Route::get('/edit/property/location/{id}','AdminController@editpropertylocation')->name('Edit-Property-Location');
    Route::post('/update/property/location','AdminController@updateapropertylocation')->name('Update-Property-Location');
    Route::post('/delete/property/location/{id}','AdminController@deletepropertylocation')->name('Delete-Property-Location');