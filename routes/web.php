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
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/create', 'CategoryController@create')->name('categories.create');
    Route::post('/store', 'CategoryController@store')->name('categories.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::post('/update/{id}', 'CategoryController@edit')->name('categories.update');
    Route::get('/show/{id}', 'CategoryController@show')->name('categories.show');
    Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/mass_destroy', 'CategoryController@massDestroy')->name('categories.mass_destroy');
});

Route::group(['prefix' => 'question'], function () {
    Route::get('/', 'QuestionController@index')->name('question.index');
    Route::get('/create', 'QuestionController@create')->name('question.create');
});
