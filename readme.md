## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Installation instructions:

Run Composer:

    composer create-project lavender-commerce/lavender

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


#### Contributing a.k.a. [Fork me](https://github.com/lavender/lavender/fork)

This repository contains the controllers, models, and views that makes Lavender an Ecommerce platform. Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) are much appreciated! (especially with frontend stuff)

To contribute to the Lavender Framework, please see the [lavender/framework](https://github.com/lavender/framework) repository.
