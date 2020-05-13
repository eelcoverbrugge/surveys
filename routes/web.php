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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/questionnaires/create', 'QuestionnaireController@create');
    Route::post('/questionnaires', 'QuestionnaireController@store');
    Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');

    Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
    Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');

});