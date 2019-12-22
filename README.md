# Laravel_RestApi

Usage
Clone the project via git clone or download the zip file.

.env
Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.

Composer Install
cd into the project directory via terminal and run the following command to install composer packages.

composer install
Generate Key
then run the following command to generate fresh key.

php artisan key:generate
Run Migration
then run the following command to create migrations in the databbase.

php artisan migrate
Passport Install
run the following command to install passport

php artisan passport:install
Make Auth System
then run the following command to generate the auth Scaffolding.

php artisan make:auth
Database Seeding
finally run the following command to seed the database with dummy content.

php artisan db:seed
