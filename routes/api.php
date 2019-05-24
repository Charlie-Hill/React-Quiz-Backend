<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/exams', 'ExamController@all')->name('exams.all');
Route::post('/exams/create', 'ExamController@create')->name('exams.create');
Route::put('/exams/update/{exam}', 'ExamController@update')->name('exams.update');
Route::delete('/exams/delete/{exam}', 'ExamController@delete')->name('exams.delete');
