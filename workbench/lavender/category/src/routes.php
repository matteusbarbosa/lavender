<?php

Route::group(['prefix' => 'category', 'namespace' => 'Lavender\Category'], function(){

    Route::get('id/{id}', 'CategoryController@getCategory');

});