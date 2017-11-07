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

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('payment-reciept/{id}', 'PaymentController@getReciept')->name('reciept');

Route::group(['prefix' => 'mobilization'], function(){
	Route::match(['get', 'post'], '/index', 'MobilizationController@index')->name('mobilization');
    Route::get('/name', 'MobilizationController@getName');
    // Route::post('/student-validate', 'MobilizationController@validateStudent')->name('validate.formfield');
});

Route::group(['prefix' => 'director'], function(){
	Route::match(['get', 'post'], '/login', 'AuthController@getLogin')->name('login');
    Route::post('/login-process', 'AuthController@postLogin')->name('login.process');
    

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
        Route::get('/', 'DirectorDashboardController@index')->name('dashboard');
        Route::group(['prefix' => 'students'], function() {
            Route::get('/', 'DirectorDashboardController@allStudent')->name('student.all');
            Route::get('/create-single', 'DirectorDashboardController@createStudent')->name('director.student');
            Route::post('/create-single/post', 'DirectorDashboardController@storeStudent')->name('director.student.process');
            Route::get('/edit/{id}', 'DirectorDashboardController@editStudent')->name('director.student.edit');
            Route::post('/edit/post/{id}', 'DirectorDashboardController@updateStudent')->name('director.student.update');
            Route::get('/delete/{id}', 'DirectorDashboardController@deleteStudent')->name('director.student.delete');
            Route::get('/verify-student', 'DirectorDashboardController@verifyPayment')->name('verify.student.payment');
            Route::get('/verify-student/process', 'DirectorDashboardController@verifyPaymentPost')->name('verify.student.payment.process');
            Route::get('/verify-student/success/{id}', 'DirectorDashboardController@verifySuccess')->name('verify.success');
        });

        Route::group(['prefix' => 'departments'], function() {
            Route::get('/', 'DirectorDashboardController@allDepartment')->name('department.all');
            Route::get('/create', 'DirectorDashboardController@createDepartment')->name('department.create');
            Route::post('/store', 'DirectorDashboardController@storeDepartment')->name('department.store');
            Route::get('/edit/{id}', 'DirectorDashboardController@editDepartment')->name('department.edit');
            Route::post('/edit/post/{id}', 'DirectorDashboardController@updateDepartment')->name('department.update');
            Route::get('/delete/{id}', 'DirectorDashboardController@deleteDepartment')->name('department.delete');
        }); 

        Route::group(['prefix' => 'session'], function() {
            Route::get('/', 'DirectorDashboardController@allSession')->name('session.all');
            Route::get('/create', 'DirectorDashboardController@createSession')->name('session.create');
            Route::post('/store', 'DirectorDashboardController@storeSession')->name('session.store');
            Route::get('/edit/{id}', 'DirectorDashboardController@editSession')->name('session.edit');
            Route::post('/update/{id}', 'DirectorDashboardController@updateSession')->name('session.update');
            Route::get('/delete/{id}', 'DirectorDashboardController@deleteSession')->name('session.delete');
        });
        
        Route::get('/logout', 'DirectorDashboardController@logout')->name('logout');
        Route::get('import-excel-bulk-upload-format', 'DirectorDashboardController@importExport');
        Route::get('downloadExcel/{type}', 'DirectorDashboardController@downloadExcel');
        Route::post('importExcel', 'DirectorDashboardController@importExcel');
    });
});