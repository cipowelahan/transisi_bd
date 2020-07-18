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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'AuthController@index')->name('login.get');
    Route::post('/', 'AuthController@login')->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeController');
});