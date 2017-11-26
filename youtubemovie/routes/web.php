<?php

Route::get('/', 'HomeController@index');

Route::get('search/{slug}', 'SearchController@search');
Route::get('top-search', 'SearchController@searchtop')->name('searchTop');
Route::post('search-movie', 'SearchController@searchMovie');

Route::post('favorite/{id}', 'FavoriteController@favoriteVideo');
Route::post('unfavorite/{id}', 'FavoriteController@unFavoriteVideo');

Route::get('my_favorites', 'FavoriteController@myFavorites')->middleware('auth');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::resource('video', 'VideoController');
Route::resource('rate', 'RateController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
