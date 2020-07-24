<?php

use App\Models\ExamTest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $exam = ExamTest::find(1);
    $examEndTime = Carbon::parse($exam->exam_schedule)->addMinutes($exam->duration_minutes)->format('Y-m-d H:i').':59';
    $now = Carbon::now()->setTimezone('asia/dhaka')->format('Y-m-d H:i:s');
    dd((Carbon::parse($examEndTime)->diffInSeconds(Carbon::parse($now)))/60);
    return "test route";
});

Auth::routes();
Route::group(['namespace' => 'Frontend', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserHomeController@index')->name('user-home');
    Route::post('buy-package', 'UserExamPackController@buyPackage')->name('buy-package');
    Route::get('make-payment', 'UserPaymentController@index')->name('make-payment');
    Route::post('payment-submit', 'UserPaymentController@paymentSubmit')->name('payment-submit');

    Route::get('packages', 'UserExamPackController@index')->name('packages');

    Route::get('exam-schedule', 'UserExamScheduleController@index')->name('exam-schedule');
    Route::post('exam/buy', 'UserExamScheduleController@buyExam')->name('buy-exam');

    Route::post('user-exam', 'UserMcqTestController@generateExamQuestion')->name('user-exam');
    Route::post('user-exam-submit', 'UserMcqTestController@submit')->name('user-exam-submit');

    Route::post('user-profile', function () {
        abort(404);
    })->name('user-profile');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'blockUser']], function () {
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
    Route::get('user-login', function () {
        return view('frontend.login');
    })->name('user-login');

    Route::get('package', function () {

        return view('frontend.package');
    })->name('user-package');

    Route::get('user-registration', function () {
        return view('frontend.registration');
    })->name('user-registration');

    Route::get('about', function () {
        return view('frontend.about');
    })->name('about');

    Route::get('contact-us', function () {
        return view('frontend.contact-us');
    })->name('contact-us');
});
Auth::routes();
