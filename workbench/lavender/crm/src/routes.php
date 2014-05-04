<?php
/**
 * Crm routes.
 * @var $this Lavender\Crm\CrmServiceProvider
 */


Route::group(['prefix' => 'crm', 'namespace' => 'Lavender\Crm'], function(){

    Route::group(['prefix' => 'user'], function(){

        Route::get('account', 'UserController@getDashboard');
        Route::get('login', 'UserController@getLogin');
        Route::post('login', 'UserController@loginAction');
        Route::get('logout', 'UserController@logoutAction');
        Route::post('register', 'UserController@registerAction');

    });

});

//Event::listen('illuminate.query', function() {
//    print_r(func_get_args());
//});