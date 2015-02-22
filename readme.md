## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel. **For more information on Lavender, please see [lavender/docs](https://github.com/lavender/docs).**


### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Support

Come chat with us in [#lavender on freenode](http://webchat.freenode.net/?channels=#lavender), or [submit an new issue.](https://github.com/lavender/lavender/issues/new)


### Installation instructions

Run Composer:

    composer create-project lavender-commerce/lavender
    
Set up your environment config file:

    lavender/.env

Create the first round of migrations:

    php artisan migrate:entity

Run your newly created migrations:

    php artisan migrate

Install lavender's dependencies:

    php artisan db:seed --class=InstallLavender
    
Seed catalog sample data! (optional)

    php artisan db:seed --class=SampleData

That's it!


### Troubleshooting

Page not loading? CPanel users [see here.](https://laracasts.com/discuss/channels/general-discussion/how-to-install-laravel-in-the-root-directory)

Login not working? Try modifying your sessions config:

    config/session.php

Emails not working? Try modifying your email config:

    config/mail.php

Something else? Follow the install instructions carefully or [submit an new issue!](https://github.com/lavender/lavender/issues/new)


### Contributing

Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) are much appreciated!

This repository contains the controllers, models, and views that makes Lavender an Ecommerce platform. 

To contribute to the Lavender Framework, please see the [lavender/framework](https://github.com/lavender/framework) repository.
