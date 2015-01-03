## Lavender

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


#### Scope

Lavender's Entity model was designed to support attribute scopes which means that all entities can be configured per store 
(domain), per department (sub-domain), or globally.
