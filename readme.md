## Lavender

Lavender is an Open Source E-Commerce Framework built on top of Laravel.

### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


+--------+------------------------------------+------+-----------------------------------------------+----------------+---------------+
| Domain | URI                                | Name | Action                                        | Before Filters | After Filters |
+--------+------------------------------------+------+-----------------------------------------------+----------------+---------------+
|        | GET|HEAD product/view/{id}         |      | Lavender\Product\ListController@getView       |                |               |
|        | GET|HEAD product/list/{collection} |      | Lavender\Product\ListController@getCollection |                |               |
|        | GET|HEAD /                         |      | Lavender\Cms\DefaultController@getIndex       |                |               |
+--------+------------------------------------+------+-----------------------------------------------+----------------+---------------+
