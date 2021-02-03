<?php

Route::get('competition', 'CompetitionController@index')->name('competition');
Route::get('competition/index', 'CompetitionController@getTableDetails')->name('competition.get_table_details');
Route::get('competition/edit/{id}', 'CompetitionController@edit')->name('competition.edit');
Route::get('competition/create', 'CompetitionController@create')->name('competition.create');
Route::post('competition/create/insert', 'CompetitionController@store')->name('competition.store');
Route::post('competition/update', 'CompetitionController@update')->name('competition.update');

Route::get('competitiors/{competition_id}', 'CompetitionController@update')->name('competitior.list');


Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/index', 'CategoryController@getTableDetails')->name('category.get_table_details');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
Route::post('category/update', 'CategoryController@update')->name('category.update');


