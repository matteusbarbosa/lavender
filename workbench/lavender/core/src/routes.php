<?php
/**
 * Core routes.
 * @var $this Lavender\Core\CoreServiceProvider
 */

// 404 - Not Found
App::missing(function($exception){
    return Response::view('core::errors.404', array('error' => $exception), 404);
});