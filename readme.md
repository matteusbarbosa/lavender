## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Installation instructions:

Run Composer:

    php composer install

    find workbench/lavender -maxdepth 1 -exec composer install -d {} \;

Set up your database connection:

    app/config/database.php

Install product table:

    php artisan migrate --path=workbench/lavender/product/src/migrations

Seed the product table with sample data:

    php artisan db:seed

