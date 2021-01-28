<?php

Route::get('/', 'CompetitionController@index');
Route::get('explorer/{category_id}/{keyword}/{sort}/{type}/{country}/{start_date}/{end_date}', 'CompetitionController@explorer')->name('explorer');

?>