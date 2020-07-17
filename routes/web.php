<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return "test route";
});

Auth::routes();
Route::group(['namespace' => 'Frontend', 'middleware' => 'auth'], function () {
    Route::post('buy-package', 'UserExamPackController@buyPackage')->name('buy-package');
    Route::get('make-payment', 'UserPaymentController@index')->name('make-payment');
    Route::post('payment-submit', 'UserPaymentController@paymentSubmit')->name('payment-submit');
    Route::post('user-profile', function () {
        abort(404);
    })->name('user-profile');
});
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
Route::group(['prefix' => '', 'namespace' => 'Frontend'], function () {
    Route::get('home', 'UserHomeController@index')->name('user-home');

    Route::get('user-login', function () {
        return view('frontend.login');
    })->name('user-login');

    Route::get('package', function () {

        return view('frontend.package');
    })->name('user-package');

    Route::get('user-registration', function () {
        return view('frontend.registration');
    })->name('user-registration');

    Route::get('packages', 'UserExamPackController@index')->name('packages');

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
