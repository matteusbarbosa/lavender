## Lavender

Lavender is an Open Source E-Commerce Framework built on top of [Laravel 5](laravel.com/docs/5.0).

> **Note:** Lavender is in active development and NOT ready for production.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Docs

Please see [lavender/docs](https://github.com/lavender/docs).


### Support

Come chat with us in [#lavender on freenode](http://webchat.freenode.net/?channels=#lavender), or [submit an new issue.](https://github.com/lavender/lavender/issues/new)


### Contributing

Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) are much appreciated!

This repository provides the consumer application which contains the [controllers](https://github.com/lavender/lavender/tree/master/app/Http/Controllers), [models](https://github.com/lavender/lavender/tree/master/app/Database), and [views](https://github.com/lavender/lavender/tree/master/resources/views/core/default) (and config, locale, etc) that makes Lavender an ecommerce platform. 

The [lavender/framework](https://github.com/lavender/framework) repository contains framework enhancements for Laravel 5, including [multiple authentication](https://github.com/lavender/framework/tree/master/src/Auth), a powerful [Entity class](https://github.com/lavender/framework/tree/master/src/Database), layout injection, and easily extensible [multi-state forms](https://github.com/lavender/framework/tree/master/src/Workflow).  


## Installation Instructions
 
### Step 1: Install Lavender with Composer.

> Avoid installing lavender in your web server's public directory. Instead create a symlink on lavender/public as your public root. 

Run composer to create the lavender application:

    composer create-project lavender-commerce/lavender
    
Set up your environment config file:

    lavender/.env    


### Step 2: Set up Lavender with Artisan.

Create the first round of migrations. This command reads the definitions in config/entity.php and compares it to your database.

    php artisan migrate:entity

Run your newly created migration file:

    php artisan migrate

Install lavender's dependencies (default store, theme, admin):

    php artisan db:seed --class=InstallLavender
    
    
### Step 3: (Optional) Seed catalog sample data!

    php artisan db:seed --class=SampleData

That's it!


### Troubleshooting

Login not working? Try modifying your sessions config:

    config/session.php

Emails not working? Try modifying your email config:

    config/mail.php

Something else? Follow the install instructions carefully or [submit an new issue!](https://github.com/lavender/lavender/issues/new)

