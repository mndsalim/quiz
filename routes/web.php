<?php

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


Route::get('/', 'dashboard\homeController@index');



Route::get('/login', 'dashboard\userController@loginform');

Route::post('/login', 'dashboard\userController@login');

Route::get('/logout', 'dashboard\userController@logout');


Route::resource('/user', 'dashboard\userController');


Route::resource('/students', 'dashboard\studentController');

Route::resource('/quizzes', 'dashboard\quizController');

Route::resource('/questions', 'dashboard\questionController');

Route::get('/questions/{question}/cancel', 'dashboard\questionController@destroy');

Route::get('/students/{student}/reset', 'dashboard\studentController@reset');
