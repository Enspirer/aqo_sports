<?php

Route::get('/', 'CompetitionController@index');
Route::get('explorer/{category_id}/{keyword}/{sort}/{type}/{country}/{start_date}/{end_date}', 'CompetitionController@explorer')->name('explorer');
Route::get('explorer/competition_page/{id}', 'CompetitionController@competition_page')->name('competition_page');
Route::post('explorer/register_request', 'CompetitionController@register_request')->name('register_request');

?>