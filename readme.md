## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel. **For more information on Lavender, please see [lavender/docs](https://github.com/lavender/docs).**


### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Support

Come chat with us on [freenode in #lavender](http://webchat.freenode.net/?channels=#lavender), or [submit an new issue.](https://github.com/lavender/lavender/issues/new)


### Installation instructions

Run Composer:

    composer create-project lavender-commerce/lavender

Set lavender/public as your new web root (example):

    ln -s lavender/public public_html

Navigate to the lavender directory:

    cd lavender
    
Set up your connection in the database config file:

    config/database.php

Run the lavender installer:

    php artisan lavender:install
    
Publish all package assets (only needed for 3rd party modules):

    php artisan asset:publish
    
Seed catalog sample data! (optional)

    php artisan db:seed --class=SampleData

That's it!


### Troubleshooting

Login not working? Try modifying your sessions config:

    config/session.php

Emails not working? Try modifying your email config:

    config/mail.php

Something else? Follow the install instructions carefully or [submit an new issue!](https://github.com/lavender/lavender/issues/new)


### Contributing

Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) are much appreciated!

This repository contains the controllers, models, and views that makes Lavender an Ecommerce platform. 

To contribute to the Lavender Framework, please see the [lavender/framework](https://github.com/lavender/framework) repository.
