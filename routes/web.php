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

Route::get('/category','CategoryController@index')->name('categories.index');
Route::get('/category/create','CategoryController@create')->name('categories.create');
Route::post('/category/store','CategoryController@store')->name('categories.store');
Route::get('/category/edit/{id}','CategoryController@edit')->name('categories.edit');
Route::post('/category/update/{id}','CategoryController@edit')->name('categories.update');
Route::get('/category/show/{id}','CategoryController@show')->name('categories.show');
Route::delete('/category/destroy/{id}','CategoryController@destroy')->name('categories.destroy');
Route::get('/category/mass_destroy','CategoryController@massDestroy')->name('categories.mass_destroy');
