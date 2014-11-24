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

    php artisan db:seed


### Project summary:

Lavender makes e-commerce easy. While Laravel provides a clean and simple framework to build database objects, handle
routing, and organize our views, Lavender goes a step further with entities, workflows, scopes, and themes.
What makes an e-commerce site unique from a developer's perspective can be split into three categories:

####1. Themes

Laravel gives us blade templates to organize our views, view-models called 'composers' for exposing logic into our views,
and easy routing with very skinny controllers. We improved the routing experience by switching to a 'routes.php' config file
available to each module. The routes are then merged into a global route collection. Templating is also easier with
view injection via the 'layout.php' config file. And lastly assigning composers to views is even easier with the
'composers.php' config file.

####2. Entities

A common task while developing features for an e-commerce site is extending existing entities (customers, orders, products,
etc) and creating new ones (blog posts, banners, etc). Lavender's 'entity.php' config file allows modules to extend and
create entities without having to deal with migrations or relationships.

####3. Workflows

Additionally we spend a lot of time customizing user workflows such as the shopping cart, checkout, various forms, etc.
Lavender's 'workflow.php' config file allows modules to collaborate on a single user workflow without complicated class
rewrites and layout injection logic.

####MultiScope

Lavender was designed from the start to be multi-scope which means that themes, entities, and workflows can be configured
per store (domain) and/or department (sub-domain) with baked-in inheritance to reduce db footprint.

####Why so much config?

The tl;dr is to manage module rewrite conflicts. Config can be merged from a large number of modules whereas hard-coded
functions and parameters are either extended or rewritten linearly. Merging from various modules into a single data object
allows for greater flexibility especially when you can control which modules to load, which config files to read, and the
priority of the rewrites.