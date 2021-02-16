<?php

Route::get('competition', 'CompetitionController@index')->name('competition');
Route::get('competition/index', 'CompetitionController@getTableDetails')->name('competition.get_table_details');
Route::get('competition/edit/{id}', 'CompetitionController@edit')->name('competition.edit');
Route::get('competition/create', 'CompetitionController@create')->name('competition.create');
Route::post('competition/create/insert', 'CompetitionController@store')->name('competition.store');
Route::post('competition/update', 'CompetitionController@update')->name('competition.update');

Route::get('competition/register_judge/{competition_id}','JudgeRequestController@edit')->name('competition.register_judge.edit');
Route::post('competition/post_judgedetails','JudgeRequestController@postDetails')->name('competition.register_judge.judge_form_edit');

Route::get('competition/judge_request/{competition_id}','JudgeRequestController@index')->name('competition.judge_request.index');
Route::get('competition/judge_requestDetails/{competition_id}','JudgeRequestController@judgeRequetDetails')->name('competition.judge_request.judgeRequetDetails');
Route::get('competition/scoreboard/{competitionID}','ScoreController@index')->name('competition.score_board');



Route::get('competition/judgeRequest/{judge_id}','JudgeRequestController@show')->name('competition.judgeRequest.show');



Route::get('competitiors/{competition_id}', 'CompetitorController@index')->name('competitior.index');
Route::get('competitiors_details/{competition_id}', 'CompetitorController@getTableDetails')->name('competitior.get_table_details');
Route::get('competitiors_details/view/{id}', 'CompetitorController@show')->name('competitior.show');
Route::post('competitiors_add','CompetitorController@changeStatus')->name('competitior.change_status');


Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/index', 'CategoryController@getTableDetails')->name('category.get_table_details');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
Route::post('category/update', 'CategoryController@update')->name('category.update');


