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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('survey-response/{user}/{survey}','SurveyReportController@showResults');
Route::get('template-status/{id}/{action}','TemplateController@changeStatus');
Route::get('question-create/{id}','QuestionController@templateQuestion')->name('question-create');



//Resource
Route::resource('report','SurveyReportController');
Route::resource('user','UsersController');
Route::resource('agent','AgentsController');
Route::resource('survey','SurveyController');
Route::resource('question','QuestionController');
Route::resource('template','TemplateController');