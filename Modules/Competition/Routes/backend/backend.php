<?php

Route::get('competition', 'CompetitionController@index')->name('competition');
Route::get('competition/index', 'CompetitionController@getTableDetails')->name('competition.get_table_details');
Route::get('competition/edit/{id}', 'CompetitionController@edit')->name('competition.edit');
Route::get('competition/create', 'CompetitionController@create')->name('competition.create');

?>