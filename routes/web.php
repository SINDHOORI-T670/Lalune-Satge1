<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('login',function(){
    return redirect('/');
})->name('login');
Route::get('register',function(){
    return redirect('/');
})->name('register');

Route::get('lang/{locale}',function($locale){
    session()->put('locale',$locale);
    return redirect()->back();
});

Route::get('/user/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

//main pages
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'WelcomeController@index');
Route::get('/agent/listing','WelcomeController@agents')->name('agent-listing');
Route::get('/broker/listing','WelcomeController@brokers')->name('broker-listing');
Route::get('/about/agent/{id}','WelcomeController@aboutagent')->name('About-Agent');
Route::get('/about/broker/{id}','WelcomeController@aboutbroker')->name('About-Broker');
Route::get('/property/{type}','WelcomeController@propertytype')->name('Property-Type');
Route::get('/proerty/{id}/details','WelcomeController@propertydetails')->name('Property-Details');

//Admin routes 
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminAuth\LoginController@showLoginForm');
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');

    // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    // Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    
});

//Agent routes 
Route::group(['prefix' => 'agent'], function () {
    Route::get('/', 'AgentAuth\LoginController@showLoginForm');
    Route::get('/login', 'AgentAuth\LoginController@showLoginForm');
    Route::post('/login', 'AgentAuth\LoginController@login');
    Route::post('/logout', 'AgentAuth\LoginController@logout');

    // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    // Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AgentAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AgentAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AgentAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AgentAuth\ResetPasswordController@showResetForm');

    
});

//Broker routes 
Route::group(['prefix' => 'broker'], function () {
    Route::get('/', 'BrokerAuth\LoginController@showLoginForm');
    Route::get('/login', 'BrokerAuth\LoginController@showLoginForm');
    Route::post('/login', 'BrokerAuth\LoginController@login');
    Route::post('/logout', 'BrokerAuth\LoginController@logout');

    // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    // Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'BrokerAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'BrokerAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'BrokerAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'BrokerAuth\ResetPasswordController@showResetForm');

    
});