## Clone & install

* Clone this repo

* Run `cp .env.example .env` to remove ".example" from ".env.example"

* Make sure to create a new database and add your database credentials to your .env file

  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=database_name
  DB_DATABASE_TEST=database_name_test
  DB_USERNAME=root
  DB_PASSWORD=
  ```
* Run `composer install`

* Run `npm install`

* Run `php artisan key:generate`

* Run `php artisan migrate` to create database tables

* Run `php artisan db:seed` to add some random data to your database for test purposes

* Run `php artisan serve` to start the server
## Preview
<img src="https://github.com/moSa963/Recipes/blob/master/preview3.png" width="300" >
<img src="https://github.com/moSa963/Recipes/blob/master/preview.png" >
<img src="https://github.com/moSa963/Recipes/blob/master/preview2.png" >
