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

    php artisan migrate --path=app/migrations

Seed the product/category tables with sample data:

    php artisan db:seed


### Current routes:

    +---------------------------+--------------------------------------------------+
    | URI                       | Action                                           |
    +---------------------------+--------------------------------------------------+
    | GET|HEAD product/id/{id}  | Lavender\Catalog\ProductController@getProduct    |
    | GET|HEAD category/id/{id} | Lavender\Catalog\CategoryController@getCategory |
    | GET|HEAD /                | Lavender\Cms\DefaultController@getIndex          |
    | GET|HEAD pos/cart         | Lavender\Pos\CartController@getCart              |
    | POST pos/cart/add/{id}    | Lavender\Pos\CartController@addToCart            |
    +---------------------------+--------------------------------------------------+

### Current tables:

    +-----------------------+
    | Tables_in_lavender_db |
    +-----------------------+
    | attribute             |
    | attribute_product     |
    | cart                  |
    | cart_item             |
    | category              |
    | category_product      |
    | item                  |
    | migrations            |
    | product               |
    | user                  |
    +-----------------------+
