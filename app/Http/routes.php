<?php

Route::get('/', 'HomeController@index');


Route::group(['namespace' => 'Customer', 'prefix' => 'customer'], function(){

	Route::controllers([
        'dashboard' => 'DashboardController',
        'password' => 'PasswordController',
        '/' => 'AuthController',
    ]);

});


Route::group(['prefix' => 'cart'], function(){

	Route::controllers([
		'/' => 'CartController',
	]);

});


Route::group(['prefix' => 'catalog'], function(){

	Route::controllers([
		'/' => 'CatalogController',
	]);

});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){

	Route::controllers([
		'/' => 'AuthController',
	]);

});


Route::group(['namespace' => 'Backend', 'prefix' => 'backend'], function(){

    Route::get('entity/{entity}/id/{id}',['uses' => 'EntityController@getEntity']);

	Route::controllers([
		'entity/{entity}' => 'EntityController',
		'/' => 'DashboardController',
	]);

});


Route::group(['prefix' => 'contact'], function(){

	Route::controllers([
		'/' => 'ContactFormController',
	]);

});