<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'quiz'], function () {
    Route::get('/', 'QuizController@index')->name('quiz.list');
    Route::get('/create', 'QuizController@create')->name('quiz.create');
    Route::post('/store', 'QuizController@store')->name('quiz.store');
    Route::get('/{id}/edit', 'QuizController@edit')->name('quiz.edit');
    Route::post('/{id}/update', 'QuizController@update')->name('quiz.update');
    Route::post('/{id}/delete', 'QuizController@delete')->name('quiz.delete');
});
