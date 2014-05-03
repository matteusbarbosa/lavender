<?php
/**
 * Pos routes.
 * @var $this Lavender\Pos\PosServiceProvider
 */


Route::group(['prefix' => 'pos', 'namespace' => 'Lavender\Pos'], function(){

    Route::group(['prefix' => 'cart'], function(){

        Route::get('/', 'CartController@getCart');
        Route::post('add/{id}', 'CartController@addToCart');

    });

});