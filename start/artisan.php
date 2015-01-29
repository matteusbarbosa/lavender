<?php

Artisan::add(new \Lavender\Support\Commands\InstallLavender());

Artisan::add(new \Lavender\Admin\Commands\CreateAdmin());

Artisan::add(new \Lavender\Catalog\Commands\CreateCategory());

Artisan::add(new \Lavender\Store\Commands\CreateStore());

Artisan::add(new \Lavender\Theme\Commands\CreateTheme());