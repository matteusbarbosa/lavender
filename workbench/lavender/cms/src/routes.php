<?php

/**
 * Route default CMS actions.
 */
Route::controller('/', 'Lavender\Cms\DefaultController');

Route::get('cms/{type}/{id}', array(
    'uses' => 'Lavender\Cms\DefaultController@Cms'
));