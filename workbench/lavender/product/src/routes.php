<?php

Route::group(['prefix' => 'product', 'namespace' => 'Lavender\Product'], function(){

    Route::get('view/{id}', 'ListController@getView');

    Route::get('list/{collection}', 'ListController@getCollection');

});