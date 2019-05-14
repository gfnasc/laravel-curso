<?php

Route::get('/series', 'SeriesController@index')->name('series_lista');
Route::get('/series/criar', 'SeriesController@create');
Route::post('/series/criar', 'SeriesController@store')->name('series_store');
Route::delete('/series/{id}', 'SeriesController@destroy');

Route::get('/series/{serie_id}/temporadas', 'TemporadasController@index');
