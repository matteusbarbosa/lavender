## Lavender (active development, unstable)

Lavender is an Open Source E-Commerce Framework built on top of Laravel.

> **Note:**  This is project is in active development, much of the functionality hasn't been exposed to the frontend.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Installation instructions:

Run Composer:

    composer create-project lavender-commerce/lavender --prefer-dist -s dev

Set lavender/public as your new web root (example):

    ln -s lavender/public public_html

Navigate to the lavender directory:

    cd lavender
    
Set up your connection in the database config file:

    vim app/config/database.php

Run the lavender installer:

    php artisan lavender:install
    
Publish all package assets:

    php artisan asset:publish
    
Seed catalog sample data! (optional)

    php artisan db:seed --class=SampleData

That's it!


### Troubleshooting
Login not working? Try modifying your sessions config:

    app/config/session.php

Emails not working? Try modifying your email config:

    app/config/mail.php

Something else? Follow the install instructions carefully or [submit an new issue!](https://github.com/lavender/lavender/issues/new)


## Updating entities:

To create a new migration based on updated entity config, run:

    php artisan migrate:entity make_foo

...which creates a migration file for you, now run:

    php artisan migrate

You're done!


#### Lavender Directories

(mostly config and maybe a default theme or two)

    /app                                    *lavender default files
        /config
        /database
        /lang
        /lib
        /start
        /storage
        /tests
        /views
    /bootstrap                              *application start files
    /public                                 *web root, use symbolic link to webserver web root
        /assets
            /{theme}
                /css
                /images
                /js

#### Recommended Package Directories

    /vendor
        /{package}
            /{namespace}
                /src                        *psr-4 autoloaded namespaced classes (application logic)
                |   /Namespace
                |       /Class.php          = Package\Namespace\Class
                |       /FooRespository.php = Package\Namespace\FooRepository
                |   /composers              *view composers, see http://laravel.com/docs/4.2/responses#view-composers
                |   /config                 *module config, see http://laravel.com/docs/4.2/configuration
                |       /composers.php
                |       /entity.php
                |       /layout.php
                |       /routes.php
                |       /workflow.php
                |   /controllers            *route controllers, see http://laravel.com/docs/4.2/controllers
                |   /helpers                *global helper functions
                |       /functions.php
                |   /lang                   *language translations, see http://laravel.com/docs/4.2/localization
                |   /models                 *consumer models
                |   /views
                |       /{theme}
                |           /{custom}       *custom view directories should be intuitive ex: contact/form/container.blade.php
                |           /email          *email templates
                |           /errors         *error pages like 404
                |           /layouts        *master layouts which define available sections and skeleton html
                |           /page           *page layouts used as top-level layout for routing (ie. home page, login page)
                /public
                |   /assets
                |       /{theme}
                |           /css
                |           /images
                |           /js
                /tests                      *see http://laravel.com/docs/4.2/testing



#### Themes

We improved the routing experience by switching to a 'routes.php' config file available to each module. The routes are
then merged from all modules into a global route collection allowing for rewrites. Adding content to arbitrary templates
is now possible via the 'layout.php' config file. And lastly assigning composers to views is even easier with the
'composers.php' config file.

ps. i don't do frontend besides core template files, so the project will remain completely css-free until someone PR's a nice looking skin!

#### Entities

A common task while developing features for an e-commerce site is extending existing entities (customers, orders, products,
etc) and creating new ones (blog posts, banners, etc). Lavender's 'entity.php' config file allows modules to extend and
create entities without having to deal with migrations or relationships.

#### Workflows

Additionally we spend a lot of time customizing user workflows such as the shopping cart, checkout, various forms, etc.
Lavender's 'workflow.php' config file allows modules to collaborate on a single user workflow without complicated class
rewrites and layout injection logic.

#### MultiScope

Lavender's Entity model was designed from the start to be multi-scope which means that all entities can be configured
per store (domain), per department (sub-domain), or globally.
