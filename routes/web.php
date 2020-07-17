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
    Route::get('payment-info', 'PaymentInfoController@index')->name('payment-info.index');
    Route::put('payment-info/{id}', 'PaymentInfoController@update')->name('payment-info.update');
    Route::post('test-question-import', 'TestQuestionController@importQuestionFromExcel')->name('test-question-import');
});
Route::group(['prefix' => ''], function () {
    Route::get('home', function () {
        $slider_enable = true;
        return view('frontend.home', ['slider_enable' => $slider_enable]);
    })->name('user-home');
    Route::get('user-login', function () {

        return view('frontend.login');
    })->name('user-login');

    Route::get('user-registration', function () {
        $slider_off = true;
        return view('frontend.registration');
    })->name('user-registration');

    Route::get('packages', function () {
        return view('frontend.packages');
    })->name('packages');

    Route::get('exam-schedule', function () {
        return view('frontend.exam-schedule');
    })->name('exam-schedule');

    Route::get('about', function () {
        return view('frontend.about');
    })->name('about');

    Route::get('contact-us', function () {
        return view('frontend.contact-us');
    })->name('contact-us');
});
Auth::routes();
