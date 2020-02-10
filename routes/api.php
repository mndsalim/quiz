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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:api')->get('/user', 'UserController@index');

// Route::post('/user', 'UserController@store');

Route::get('/user', 'UserController@show');

Route::get('/quiz', 'StudentQuizController@index')->name('quiz');

Route::post('/quiz', 'StudentQuizController@store')->name('answer');

Route::get('/quiz/result/{studentQuiz}', 'StudentQuizController@quizResult')->name('result1');

Route::get('/quiz/result', 'StudentQuizController@quizResult')->name('result');
