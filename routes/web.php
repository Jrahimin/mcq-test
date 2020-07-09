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
Route::get('test', function () {
    $user = \App\User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'mobile_no' => '01846966947',
        'address' => 'dhaka',
        'type' => 0,
        'status' => 0,
        'password' => bcrypt("Password@1"),
    ]);

    dd($user);
});

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
