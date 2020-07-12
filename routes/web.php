<?php

use Illuminate\Routing\RouteGroup;
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

Route::group(['prefix' => 'category'], function () {
    Route::group(['middleware' => 'admin.role'], function () {
        Route::get('/create', 'CategoryController@create')->name('categories.create');
        Route::post('/store', 'CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
        Route::get('/mass_destroy', 'CategoryController@massDestroy')->name('categories.mass_destroy');
    });
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/show/{id}', 'CategoryController@show')->name('categories.show');
});

Route::group(['prefix' => 'question'], function () {
    Route::group(['middleware' => 'admin.role'], function () {
        Route::get('/create', 'QuestionController@create')->name('question.create');
        Route::post('/store', 'QuestionController@store')->name('question.store');
        Route::get('/edit/{id}', 'QuestionController@edit')->name('question.edit');
        Route::post('/update/{id}', 'QuestionController@update')->name('question.update');
        Route::get('/destroy/{id}', 'QuestionController@destroy')->name('question.destroy');
    });
    Route::group(['middleware' => 'manager.role'], function () {
        Route::get('/', 'QuestionController@index')->name('question.index');
        Route::get('/show/{id}', 'QuestionController@show')->name('question.show');
    });

});


Route::group(['prefix' => 'quiz'], function () {
    Route::group(['middleware' => 'manager.role'], function () {
        Route::get('/{id}/edit', 'QuizController@edit')->name('quiz.edit');
        Route::post('/{id}/update', 'QuizController@update')->name('quiz.update');
        Route::post('/{id}/delete', 'QuizController@delete')->name('quiz.delete');
        Route::get('/create', 'QuizController@create')->name('quiz.create');
        Route::post('/store', 'QuizController@store')->name('quiz.store');
    });
    Route::get('/', 'QuizController@index')->name('quiz.list');
    Route::get('/{id}/detail', 'QuizController@show')->name('quiz.show');
    Route::get('/{id}/statistics', 'QuizController@statisticsCalculate')->name('quiz.statistics');
});


Route::group(['middleware' => 'manager.role', 'prefix' => 'quiz-question'], function () {
    Route::post('/store', 'QuizQuestionController@store')->name('quizQuestion.store');
    Route::get('/{id}/delete', 'QuizQuestionController@destroy')->name('quizQuestion.destroy');
    Route::post('/multiDelete', 'QuizQuestionController@multiDestroy')->name('quizQuestion.multiDestroy');
});

Route::group(['middleware' => 'admin.role', 'prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user.list');
    Route::get('/promote/{id}', 'UserController@promote')->name('user.promote');
    Route::get('/demote/{id}', 'UserController@demote')->name('user.demote');
    Route::post('/block/{id}', 'UserController@block')->name('user.block');
});

Route::group(['prefix' => 'test'], function () {
    Route::get('/doExam/{id}', 'UserQuizController@index')->name('quiz.doQuiz');
    Route::post('/', 'UserQuizController@doQuiz')->name('quiz.submit');
    Route::get('/result/{quizId}/user/{userId}', 'QuizResultController@showResult')->name('quiz.result');
});
