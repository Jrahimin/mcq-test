<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return "test route";
});

Auth::routes();
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('exam-test', 'ExamTestController');
    Route::resource('test-question', 'TestQuestionController');
    Route::resource('exam-pack', 'ExamPackController');
    Route::resource('user-management', 'UserManagementController');
    Route::get('payment-info', 'PaymentInfoController@index');
    Route::put('payment-info/{id}', 'PaymentInfoController@update');
    Route::post('test-question-import', 'TestQuestionController@importQuestionFromExcel')->name('test-question-import');
});

Auth::routes();
