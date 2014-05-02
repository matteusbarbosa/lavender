<?php
/**
 * CMS routes.
 * @var $this Lavender\Cms\CmsServiceProvider
 */

Route::group(['namespace' => 'Lavender\Cms'], function(){

    Route::get('/', 'DefaultController@getIndex');

});