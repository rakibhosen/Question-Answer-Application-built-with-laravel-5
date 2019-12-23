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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// question route
Route::resource('questions','QuestionController')->except('show');
Route::get('questions/{slug}','QuestionController@show')->name('questions.show');

// Answer route
Route::resource('questions.answers','AnswersController')->except('index','create');

// answer accepted route
Route::post('/answers/{answer}/accept','AcceptAnswerController')->name('answers.accept');
// favorites route
Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');