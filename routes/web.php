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

Route::get('migrate', function (){
    \Artisan::call('migrate');

    return "migration done";
});

Route::get('cache', function (){
    \Artisan::call('config:cache');

    return "cache clear";
});

Route::get('seed', function (){
    \Artisan::call('db:seed');

    return "cache clear";
});

Route::get('test', function () {
    if(\App\User::where('email', 'admin@gmail.com')->first())
        return "test";

    $user = \App\User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'type' => \App\Enums\UserTypes::SUPERADMIN,
        'status' => 1,
        'password' => bcrypt("Password@1"),
    ]);

    dd($user);
});

Route::get('/', function () {
    return view('admin.dashboard');
});

Auth::routes();
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('exam-test', 'ExamTestController');
    Route::resource('test-question', 'TestQuestionController');
    Route::resource('exam-pack', 'ExamPackController');
    Route::resource('user-management', 'UserManagementController');
    Route::post('test-question-import', 'TestQuestionController@importQuestionFromExcel')->name('test-question-import');
});

Auth::routes();
