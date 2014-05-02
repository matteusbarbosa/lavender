<?php

Route::group(['prefix' => 'product', 'namespace' => 'Lavender\Product'], function(){

    Route::get('{id}', 'ProductController@getProduct');

});