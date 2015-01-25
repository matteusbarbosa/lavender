<?php

/*
|--------------------------------------------------------------------------
| Set PHP Error Reporting Options
|--------------------------------------------------------------------------
|
| Here we will set the strictest error reporting options, and also turn
| off PHP's error reporting, since all errors will be handled by the
| framework and we don't want any output leaking back to the user.
|
*/

error_reporting(-1);

/*
|--------------------------------------------------------------------------
| Check Extensions
|--------------------------------------------------------------------------
|
| Laravel requires a few extensions to function. Here we will check the
| loaded extensions to make sure they are present. If not we'll just
| bail from here. Otherwise, Composer will crazily fall back code.
|
*/

if(!extension_loaded('mcrypt')){
    echo 'Mcrypt PHP extension required.' . PHP_EOL;

    exit(1);
}

/*
|--------------------------------------------------------------------------
| Register Class Imports
|--------------------------------------------------------------------------
|
| Here we will just import a few classes that we need during the booting
| of the framework. These are mainly classes that involve loading the
| config files for this application, such as the config repository.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Config\EnvironmentVariables;
use Illuminate\Config\Repository as Config;

/*
|--------------------------------------------------------------------------
| Bind The Application In The Container
|--------------------------------------------------------------------------
|
| This may look strange, but we actually want to bind the app into itself
| in case we need to Facade test an application. This will allow us to
| resolve the "app" key out of this container for this app's facade.
|
*/

$app->instance('app', $app);

/*
|--------------------------------------------------------------------------
| Check For The Test Environment
|--------------------------------------------------------------------------
|
| If the "unitTesting" variable is set, it means we are running the unit
| tests for the application and should override this environment here
| so we use the right configuration. The flag gets set by TestCase.
|
*/

if(isset($unitTesting)){
    $app['env'] = $env = $testEnvironment;
}

/*
|--------------------------------------------------------------------------
| Load The Illuminate Facades
|--------------------------------------------------------------------------
|
| The facades provide a terser static interface over the various parts
| of the application, allowing their methods to be accessed through
| a mixtures of magic methods and facade derivatives. It's slick.
|
*/

Facade::clearResolvedInstances();

Facade::setFacadeApplication($app);

/*
|--------------------------------------------------------------------------
| Register Facade Aliases To Full Classes
|--------------------------------------------------------------------------
|
| By default, we use short keys in the container for each of the core
| pieces of the framework. Here we will register the aliases for a
| list of all of the fully qualified class names making DI easy.
|
*/

$app->registerCoreContainerAliases();

/*
|--------------------------------------------------------------------------
| Register The Environment Variables
|--------------------------------------------------------------------------
|
| Here we will register all of the $_ENV and $_SERVER variables into the
| process so that they're globally available configuration options so
| sensitive configuration information can be swept out of the code.
|
*/

with($envVariables = new EnvironmentVariables(
    $app->getEnvironmentVariablesLoader()))->load($env);

/*
|--------------------------------------------------------------------------
| Register The Configuration Repository
|--------------------------------------------------------------------------
|
| The configuration repository is used to lazily load in the options for
| this application from the configuration files. The files are easily
| separated by their concerns so they do not become really crowded.
|
*/

$app->instance('config', $config = new Config(

    $app->getConfigLoader(), $env

));

/*
|--------------------------------------------------------------------------
| Register Application Exception Handling
|--------------------------------------------------------------------------
|
| We will go ahead and register the application exception handling here
| which will provide a great output of exception details and a stack
| trace in the case of exceptions while an application is running.
|
*/

$app->startExceptionHandling();

if($env != 'development') ini_set('display_errors', 'Off');

/*
|--------------------------------------------------------------------------
| Set The Default Timezone
|--------------------------------------------------------------------------
|
| Here we will set the default timezone for PHP. PHP is notoriously mean
| if the timezone is not explicitly set. This will be used by each of
| the PHP date and date-time functions throughout the application.
|
*/

$config = $app['config']['app'];

date_default_timezone_set($config['timezone']);

/*
|--------------------------------------------------------------------------
| Register The Alias Loader
|--------------------------------------------------------------------------
|
| The alias loader is responsible for lazy loading the class aliases setup
| for the application. We will only register it if the "config" service
| is bound in the application since it contains the alias definitions.
|
*/

$aliases = $config['aliases'];

AliasLoader::getInstance($aliases)->register();

/*
|--------------------------------------------------------------------------
| Enable HTTP Method Override
|--------------------------------------------------------------------------
|
| Next we will tell the request class to allow HTTP method overriding
| since we use this to simulate PUT and DELETE requests from forms
| as they are not currently supported by plain HTML form setups.
|
*/

Request::enableHttpMethodParameterOverride();

/*
|--------------------------------------------------------------------------
| Register The Core Service Providers
|--------------------------------------------------------------------------
|
| The Illuminate core service providers register all of the core pieces
| of the Illuminate framework including session, caching, encryption
| and more. It's simply a convenient wrapper for the registration.
|
*/

$providers = $config['providers'];

$app->getProviderRepository()->load($app, $providers);

/*
|--------------------------------------------------------------------------
| Register Booted Start Files
|--------------------------------------------------------------------------
|
| Once the application has been booted there are several "start" files
| we will want to include. We'll register our "booted" handler here
| so the files are included after the application gets booted up.
|
*/

$app->booted(function () use ($app, $env){


    /*
    |--------------------------------------------------------------------------
    | Register The Laravel Class Loader
    |--------------------------------------------------------------------------
    |
    | In addition to using Composer, you may use the Laravel class loader to
    | load your controllers and models. This is useful for keeping all of
    | your classes in the "global" namespace without Composer updating.
    |
    */

    ClassLoader::addDirectories(array(

        app_path() . '/database/migrations',
        app_path() . '/database/seeds',

    ));

    /*
    |--------------------------------------------------------------------------
    | Application Error Logger
    |--------------------------------------------------------------------------
    |
    | Here we will configure the error logger setup for the application which
    | is built on top of the wonderful Monolog library. By default we will
    | build a basic log file setup which creates a single file for logs.
    |
    */

    $app->log->useFiles(storage_path() . '/logs/lavender.log');

    /*
    |--------------------------------------------------------------------------
    | Application Error Handler
    |--------------------------------------------------------------------------
    |
    | Here you may handle any errors that occur in your application, including
    | logging them or displaying custom views for specific errors. You may
    | even register several error handlers to handle different types of
    | exceptions. If nothing is returned, the default error view is
    | shown, which includes a detailed stack trace during debug.
    |
    */

    $app->error(function (Exception $exception, $code){
        Log::error($exception);
    });

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Handler
    |--------------------------------------------------------------------------
    |
    | The "down" Artisan command gives you the ability to put an application
    | into maintenance mode. Here, you will define what is displayed back
    | to the user if maintenance mode is in effect for the application.
    |
    */

    $app->down(function (){
        return Response::make("Be right back!", 503);
    });


    /*
    |--------------------------------------------------------------------------
    | CSRF Protection Filter
    |--------------------------------------------------------------------------
    |
    | The CSRF filter is responsible for protecting your application against
    | cross-site request forgery attacks. If this special token in a user
    | session does not match the one given in this request, we'll bail.
    |
    */

    // Apply CSRF filter to all 'post', 'put', and 'delete' requests
    Route::when('*', 'csrf', ['post', 'put', 'delete']);

    Route::filter('csrf', function (){
        if(Session::token() != Input::get('_token')){
            throw new Illuminate\Session\TokenMismatchException;
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Load The Environment Start Script
    |--------------------------------------------------------------------------
    |
    | The environment start script is only loaded if it exists for the app
    | environment currently active, which allows some actions to happen
    | in one environment while not in the other, keeping things clean.
    |
    */

    $start_script = $app['path'] . "/start/{$env}.php";

    if(file_exists($start_script)) require $start_script;

});
