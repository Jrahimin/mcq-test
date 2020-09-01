<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return "this is test";
});

Auth::routes();
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'UserHomeController@index')->name('user-home');
    Route::get('packages', 'UserExamPackController@index')->name('packages');
    Route::get('package/{id}', 'UserExamPackController@detail')->name('exam-pack-detail');
    Route::get('exam-schedule', 'UserExamScheduleController@index')->name('exam-schedule');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('buy-package', 'UserExamPackController@buyPackage')->name('buy-package');
        Route::get('make-payment', 'UserPaymentController@index')->name('make-payment');
        Route::post('payment-submit', 'UserPaymentController@paymentSubmit')->name('payment-submit');

        Route::post('exam/buy', 'UserExamScheduleController@buyExam')->name('buy-exam');

        Route::post('user-exam', 'UserMcqTestController@generateExamQuestion')->name('user-exam');
        Route::post('user-exam-submit', 'UserMcqTestController@submit')->name('user-exam-submit');

        Route::get('user-profile', 'UserProfileController@getUserInfo')->name('user-profile');
        Route::post('user-exam-list', 'UserProfileController@getUserExams')->name('user-exam-list');
        Route::post('user-pack-list', 'UserProfileController@getUserExamPack')->name('user-pack-list');
        Route::post('user-score-chart', 'UserProfileController@getUserScoreChartData')->name('user-score-chart');
        Route::put('user-password-reset', 'UserProfileController@userPasswordReset')->name('user-password-reset');
    });
});
Route::post('feedback', 'Admin\FeedbackController@store')->name('feedback');
Route::group(['middleware' => 'auth'], function () {
    Route::post('exam-preview', 'CommonExamPreviewController@generateExamPreview')->name('exam-preview');
    Route::get('exam-ranking', 'CommonExamPreviewController@getExamRanking')->name('exam-ranking');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'blockUser']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('exam-test', 'ExamTestController');
    Route::resource('test-question', 'TestQuestionController');
    Route::resource('exam-pack', 'ExamPackController');
    Route::resource('user-management', 'UserManagementController');
    Route::put('user-management/password-reset/{id}', 'UserManagementController@passwordReset');
    Route::post('user-management/balance-adjust/{id}', 'UserManagementController@balanceAdjust');
    Route::get('payment-info', 'PaymentInfoController@index')->name('payment-info.index');
    Route::put('payment-info/{id}', 'PaymentInfoController@update')->name('payment-info.update');
    Route::post('test-question-import', 'TestQuestionController@importQuestionFromExcel')->name('test-question-import');
    Route::get('feedback-list', 'FeedbackController@index')->name('feedback-list');
    Route::post('feedback-read-status-update/{id}', 'FeedbackController@readStatusUpdate')->name('feedback-read-status-update');
});
Route::group(['prefix' => '', 'namespace' => 'Frontend'], function () {
    /*Route::get('user-login', function () {
        return view('frontend.login');
    })->name('user-login');*/

    Route::get('package', function () {

        return view('frontend.package');
    })->name('user-package');

    /*Route::get('user-registration', function () {
        return view('frontend.registration');
    })->name('user-registration');*/

    Route::get('about', function () {
        return view('frontend.about');
    })->name('about');

    Route::get('contact-us', function () {
        return view('frontend.contact-us');
    })->name('contact-us');
});

Auth::routes();
