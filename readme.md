## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Installation instructions:

Run Composer:

    composer install

Set up your database connection:

    app/config/database.php

Install entities:

    php artisan entity:update

Seed the entities with sample data:

    php artisan entity:seed

#### Application Directories

    app                                 lavender default files (mostly config and maybe a default theme or two)
        config
        database
        lang
        lib
        start
        storage
        tests
        views
    bootstrap                           application start files
    public                              web root, use symbolic link to webserver web root
        assets
            {theme}
                css
                images
                js
    vendor                              composer generated directory
        {package}
            {namespace}
                composers               view composers, see http://laravel.com/docs/4.2/responses#view-composers
                config                  module config, see http://laravel.com/docs/4.2/configuration
                controllers             route controllers, see http://laravel.com/docs/4.2/controllers
                models                  consumer models
                src                     application logic
                views                   template files, see http://laravel.com/docs/4.2/templates#blade-templating
                    {theme}
                        block           content templates which are injected into page layouts
                        email           email templates
                        errors          error pages like 404
                        layouts         master layouts which define available sections and skeleton html
                        page            page layouts used as top-level layout for routing (ie. home page, login page)

#### Themes

We improved the routing experience by switching to a 'routes.php' config file available to each module. The routes are
then merged from all modules into a global route collection allowing for rewrites. Adding content to arbitrary templates
is now possible via the 'layout.php' config file. And lastly assigning composers to views is even easier with the
'composers.php' config file.


#### Entities

A common task while developing features for an e-commerce site is extending existing entities (customers, orders, products,
etc) and creating new ones (blog posts, banners, etc). Lavender's 'entity.php' config file allows modules to extend and
create entities without having to deal with migrations or relationships.

#### Workflows

Additionally we spend a lot of time customizing user workflows such as the shopping cart, checkout, various forms, etc.
Lavender's 'workflow.php' config file allows modules to collaborate on a single user workflow without complicated class
rewrites and layout injection logic.

####4. MultiScope

Lavender's Entity model was designed from the start to be multi-scope which means that all entities can be configured
per store (domain), per department (sub-domain), or globally.