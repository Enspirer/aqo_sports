<?php

Route::get('competition', 'CompetitionController@index')->name('competition');
Route::get('competition/index', 'CompetitionController@getTableDetails')->name('competition.get_table_details');
Route::get('competition/edit/{id}', 'CompetitionController@edit')->name('competition.edit');
Route::get('competition/create', 'CompetitionController@create')->name('competition.create');
Route::post('competition/create/insert', 'CompetitionController@store')->name('competition.store');
Route::post('competition/update', 'CompetitionController@update')->name('competition.update');
Route::get('competition/delete/{id}', 'CompetitionController@destroy')->name('competition.destroy');


Route::get('competition/register_judge/{competition_id}','JudgeRequestController@edit')->name('competition.register_judge.edit');
Route::post('competition/post_judgedetails','JudgeRequestController@postDetails')->name('competition.register_judge.judge_form_edit');

Route::get('competition/judge_request/{competition_id}','JudgeRequestController@index')->name('competition.judge_request.index');
Route::get('competition/judge_requestDetails/{competition_id}','JudgeRequestController@judgeRequetDetails')->name('competition.judge_request.judgeRequetDetails');
Route::get('competition/scoreboard/{competitionID}','ScoreController@index')->name('competition.score_board');
Route::get('competition/judge_request/delete/{id}', 'JudgeRequestController@destroy')->name('competition.judge_request.destroy');



Route::get('competition/judgeRequest/{judge_id}','JudgeRequestController@show')->name('competition.judgeRequest.show');
Route::post('competition/judgeReq/ENPS','JudgeRequestController@ChangeStatus')->name('competition.judgeRequest.changeStatus');

Route::get('competition/organizer_request/','OrganizerRequestController@index')->name('competition.organizer_request.index');
Route::get('competition/organizer_request/index', 'OrganizerRequestController@getTableDetails')->name('competition.organizer_request.get_table_details');
Route::get('competition/organizer_request/show/{id}', 'OrganizerRequestController@show')->name('competition.organizer_request.show');
Route::get('competition/organizer_request/delete/{id}', 'OrganizerRequestController@destroy')->name('competition.organizer_request.destroy');

Route::post('competition/organizer/appvoe', 'OrganizerRequestController@update')->name('competition.organizer_request.update');

Route::get('votes/{id}','VotesController@index')->name('votes.index');
Route::get('votes/get_details/{id}', 'VotesController@get_details')->name('votes.get_details');

Route::get('competitiors/{competition_id}', 'CompetitorController@index')->name('competitior.index');
Route::get('competitiors_details/{competition_id}', 'CompetitorController@getTableDetails')->name('competitior.get_table_details');
Route::get('competitiors_details/view/{id}', 'CompetitorController@show')->name('competitior.show');
Route::get('competitiors_details/performance/{id}', 'CompetitorController@performance')->name('competitior.performance');
Route::get('competitiors/delete/{id}', 'CompetitorController@destroy')->name('competitior.destroy');
Route::post('competitiors_add','CompetitorController@changeStatus')->name('competitior.change_status');


Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/index', 'CategoryController@getTableDetails')->name('category.get_table_details');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::post('category/update', 'CategoryController@update')->name('category.update');


Route::get('become_judge','BecomeJudgeController@index')->name('become_judge.index');
Route::get('become_judge/get_details', 'BecomeJudgeController@get_details')->name('become_judge.get_details');
Route::get('become_judge/show/{id}', 'BecomeJudgeController@show')->name('become_judge.show');
Route::get('become_judge/delete/{id}', 'BecomeJudgeController@destroy')->name('become_judge.destroy');
Route::post('become_judge/update', 'BecomeJudgeController@update')->name('become_judge.update');

// Route::get('votes','VotesController@index')->name('votes.index');
// Route::get('votes/get_details', 'VotesController@get_details')->name('votes.get_details');
// Route::get('votes/show/{id}', 'VotesController@show')->name('votes.show');
// Route::get('votes/delete/{id}', 'VotesController@destroy')->name('votes.destroy');
// Route::post('votes/update', 'VotesController@update')->name('votes.update');


