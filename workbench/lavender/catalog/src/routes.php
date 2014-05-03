<?php

Route::group(['prefix' => 'product', 'namespace' => 'Lavender\Catalog'], function(){

    Route::get('id/{id}', 'ProductController@getProduct');

});

Route::group(['prefix' => 'category', 'namespace' => 'Lavender\Catalog'], function(){

    Route::get('id/{id}', 'CategoryController@getCategory');

});