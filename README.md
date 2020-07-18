# Laravel 6

## Server Requirements
- Composer
- MySQL ^5.7.29
- PHP ^7.2.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Gd PHP Extension
- Zip PHP Extension
- Mysql PHP Extension

## Installation
clone this project and run this on console/terminal
```
composer install

cp .env.example .env
(or copy file .env.example to .env in file manager)

php artisan key:generate
```

## Environment Configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={your database}
DB_USERNAME={username for access database}
DB_PASSWORD={password for access database}
```

## Cache Configuration
```
php artisan config:cache
```

## Running Migrations
```
php artisan migrate --seed
```
>`--seed` seeder laravel for seed database

## default user
email `admin@transisi.id`
password `transisi`

## Storage Link
make link storage to public
```
php artisan storage:link
```

## Run Application
```
php artisan serve --host= --port=

or

php -S {host}:{port} -t public