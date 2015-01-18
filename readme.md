## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel.


### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Installation instructions

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


### Lavender Ecommerce Features

#### Entities



#### Themes

You can configure routes, route filter, views, and view composers based on themes. Themes can be configured to fallback to the 'default' theme with an unlimited depth of inheritence.

#### Routing

Routes can be configured from the 'routes.php' config file. available to each module. 

#### Layout Injection

Injecting content to templates is done via the 'layout.php' config file. 

#### View composers and Filters

You can assign composers to views with the 'composers.php' config file and predefine route filters in 'filters.php' file.


### Contributing

This repository contains the controllers, models, and views that makes Lavender an Ecommerce platform. Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) are much appreciated! (especially with frontend stuff)

To contribute to the Lavender Framework, please see the [lavender/framework](https://github.com/lavender/framework) repository.
