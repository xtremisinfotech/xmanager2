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

Route::prefix('xi-admin')->name('admin.')->group(function() {

    Route::get('/', 'LoginController@index');
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/doLogin', 'LoginController@doLogin')->name('doLogin');

    Route::middleware(['CHECK_ADMIN_LOGIN'])->group(function() {
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });

});
