<?php


/**
 * Home page
 */
Route::get('/', 'HomeController@index');


/**
 * Catalog routes
 *  - Category and Product pages
 */
Route::group(['prefix' => 'catalog'], function(){

    Route::controllers([
        '/' => 'CatalogController',
    ]);

});


/**
 * Simple contact form
 *  - single page and workflow
 */
Route::group(['prefix'  => 'contact'], function(){

    Route::controllers([
        '/'         => 'ContactFormController',
    ]);

});


/**
 * Customer routes
 *  - namespace App\Http\Controllers\Customer
 *  - Various dashboards and workflow(s)
 *  - middleware handled by controllers
 */
Route::group([
    'namespace'     => 'Customer',
    'prefix'        => 'customer'
], function(){

	Route::controllers([
        'dashboard' => 'DashboardController',
        'password'  => 'PasswordController',
        '/'         => 'AuthController',
    ]);

});


/**
 * Shopping cart routes
 *  - namespace App\Http\Controllers\Cart
 *  - Cart page and cart item workflow(s)
 */
Route::group([
    'namespace'     => 'Cart',
    'prefix'        => 'cart'
], function(){

	Route::controllers([
		'item'      => 'ItemController',
		'/'         => 'CartController',
	]);

});


/**
 * Checkout routes
 *  - namespace App\Http\Controllers\Checkout
 *  - Checkout workflow
 */
Route::group([
    'namespace'     => 'Checkout',
    'prefix'        => 'checkout',
    'middleware'    => 'cart',
], function(){

	Route::controllers([
		'success'   => 'SuccessController',
		'review'    => 'ReviewController',
		'payment'   => 'PaymentController',
		'shipping'  => 'ShippingController',
		'/'         => 'IndexController',
	]);

});


/**
 * Admin routes
 *  - App\Http\Controllers\Admin
 *  - Login form
 *  - Protected by 'admin_guest' middleware:
 *      redirect authenticated admins or allow public
 */
Route::group([
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'admin_guest',
], function(){

	Route::controllers([
		'/'         => 'AuthController',
	]);

});


/**
 * Backend Routes
 *  - App\Http\Controllers\Backend
 *  - Various dashboards, tables, and forms
 *  - Protected by 'backend' middleware
 */

Route::group([
    'namespace'     => 'Backend',
    'prefix'        => 'backend',
    'middleware'    => 'backend',
], function(){

    Route::group(['namespace' => 'Website'], function(){

        Route::controllers([
            'store'     => 'StoreController',
            'theme'     => 'ThemeController',
            'config'    => 'ConfigController',
        ]);

    });

    Route::group(['namespace' => 'Account'], function(){

        Route::controllers([
            'customer'  => 'CustomerController',
            'admin'     => 'AdminController',
        ]);

    });

    Route::group(['namespace' => 'Catalog'], function(){

        Route::controllers([
            'product'   => 'ProductController',
            'category'  => 'CategoryController',
        ]);

    });

    Route::controllers([
        'website'       => 'WebsiteController',
        'account'       => 'AccountController',
        'sales'         => 'SalesController',
        'catalog'       => 'CatalogController',
        '/'             => 'DashboardController',
    ]);

});