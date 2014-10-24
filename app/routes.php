<?php

Route::group(['namespace' => 'Lavender\Cms'], function(){

    Route::get('/', 'DefaultController@getIndex');

});