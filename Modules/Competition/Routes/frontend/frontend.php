<?php

Route::get('/', 'CompetitionController@index');
Route::get('explorer/{category}/{keyword}/{sort}/{country}/{start_date}/{end_date}', 'CompetitionController@explorer')->name('explorer');
Route::get('explorer/competition_page/{id}', 'CompetitionController@competition_page')->name('competition_page');
Route::post('explorer/register_request', 'CompetitionController@register_request')->name('register_request');
Route::post('explorer/judge_request', 'CompetitionController@register_judge')->name('register_judge');

Route::post('explorer/search_keyword', 'CompetitionController@search')->name('search_keyword');


Route::post('search_result', 'CompetitionController@searchFilters')->name('search_filters');


?>