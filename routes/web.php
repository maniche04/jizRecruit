<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'InterviewController@index');
Route::get('/admin','QuestionsController@index');
Route::get('/question/all','QuestionsController@all');
Route::post('/question/save','QuestionsController@save');
Route::get('/question/delete/{questionid?}','QuestionsController@delete');
Route::post('/candidate/save','CandidatesController@save');
Route::get('/interview/{candidateId?}','InterviewController@start');
Route::post('/interview/save','InterviewController@save');
Route::get('/interview/check/{candidateId?}','InterviewController@check');

Route::get('thanks',function(){
	return view('thankyou');
});

Route::get('/admin/results/{candidateId?}','InterviewController@results');
Route::get('/candidate/list','CandidatesController@index');