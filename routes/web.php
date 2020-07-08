<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['namespace' => 'Admin'], function () {
    Route::resource('exam-test', 'ExamTestController');
    Route::resource('test-question', 'TestQuestionController');
    Route::resource('exam-pack', 'ExamPackController');
    Route::resource('user-management', 'UserManagementController');
    Route::post('test-question-import', 'TestQuestionController@importQuestionFromExcel')->name('test-question-import');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
