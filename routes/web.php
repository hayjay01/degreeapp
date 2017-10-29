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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'mobilization'], function(){
	Route::match(['get', 'post'], '/index', 'MobilizationController@index');
});

Route::group(['prefix' => 'director'], function(){
	Route::match(['get', 'post'], '/login', 'AuthController@getLogin')->name('login.form');
    Route::post('/login-process', 'AuthController@postLogin')->name('login.process');

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
        Route::get('/', 'DirectorDashboardController@index')->name('dashboard');
        Route::get('/all-students', 'DirectorDashboardController@allStudent')->name('student.all');
        Route::get('/add-student-single', 'DirectorDashboardController@createStudent')->name('director.student');
        Route::post('/add-student-single/post', 'DirectorDashboardController@storeStudent')->name('director.student.process');
        Route::get('/logout', 'DirectorDashboardController@logout')->name('logout');
    });
});