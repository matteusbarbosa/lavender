<?php
namespace Lavender\Core;

use Illuminate\Foundation\Application as CoreApplication;

class Application extends CoreApplication
{

    protected static $requestClass = 'Lavender\Core\Http\Request';


}