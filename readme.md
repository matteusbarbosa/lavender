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

Install product/category tables:

    php artisan migrate --path=workbench/lavender/catalog/src/migrations

Seed the product/category tables with sample data:

    php artisan db:seed


### Current routes:

    +---------------------------+--------------------------------------------------+
    | URI                       | Action                                           |
    +---------------------------+--------------------------------------------------+
    | GET|HEAD product/id/{id}  | Lavender\Product\ProductController@getProduct    |
    | GET|HEAD category/id/{id} | Lavender\Category\CategoryController@getCategory |
    | GET|HEAD /                | Lavender\Cms\DefaultController@getIndex          |
    +---------------------------+--------------------------------------------------+