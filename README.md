### Install via Composer
============================

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
git clone https://github.com/YefimovArtem/GroupUsers-yii2.git
composer global require "fxp/composer-asset-plugin:~1.1.1"
cd GroupUsers-yii2
composer install
~~~

GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize the installed application. You only need to do these once for all.

* Create a new database
* Edit the file `api/config/main-local.php` with real data, for example:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=***HOST***;dbname=***DB NAME***',
    'username' => '***USER NAME***',
    'password' => '***PASSWORD***',
    'charset' => 'utf8',
];
```
* Apply migrations with console command `yii migrate` or `php yii migrate`. This will create tables needed for the application to work.
* Create a domain and configure it to the folder LinkShortener-yii2/web

Now you can then access the application through the following URL:
~~~
http://YOUR_DOMAIN/api/web/v1/
~~~


API methods
---------------

- Get groups list
~~~
GET http://YOUR_DOMAIN/api/web/v1/groups
~~~

- View group
~~~
GET http://YOUR_DOMAIN/api/web/v1/groups/<id>
~~~

- Create group
~~~
POST http://YOUR_DOMAIN/api/web/v1/groups
Options: name
~~~

- Modify group
~~~
PUT http://YOUR_DOMAIN/api/web/v1/groups/<id>
OR
POST http://YOUR_DOMAIN/api/web/v1/groups/<id>/modify
Options: name
~~~

- Delete group
~~~
DELETE http://YOUR_DOMAIN/api/web/v1/groups/<id>
~~~

- Get group users list
~~~
GET http://YOUR_DOMAIN/api/web/v1/groups/<id>/users
~~~

- Delete user from group
~~~
DELETE http://YOUR_DOMAIN/api/web/v1/groups/<id>/users/<user_id>
~~~


- Get users list
~~~
GET http://YOUR_DOMAIN/api/web/v1/users
~~~

- View user
~~~
GET http://YOUR_DOMAIN/api/web/v1/users/<id>
~~~

- Create user
~~~
POST http://YOUR_DOMAIN/api/web/v1/users
Options: email(required)
Options: last_name
Options: first_name
Options: status(required)
Options: groupIds[]
~~~

- Modify user
~~~
PUT http://YOUR_DOMAIN/api/web/v1/users/<id>
OR
POST http://YOUR_DOMAIN/api/web/v1/users/<id>/modify
Options: email(required)
Options: last_name
Options: first_name
Options: status(required)
Options: groupIds[]
~~~


-------------------------------------

