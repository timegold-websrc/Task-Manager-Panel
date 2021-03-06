<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Site, Task, User CRUD Laravel 5.7

> dashboard, site management, task management, user management

## Download
First, clone project:
``` bash
# clone
https://github.com/timegold-websrc/Task-Manager-Panel.git

# Access project
cd crud-laravel-5.7
```

## Config

``` bash
# Install dependencies
composer install

# Create file .env
cp .env.example .env

# Generate key
php artisan key:generate

# Run migrations (tables and Seeders)
php artisan migrate --seed

# Create Server
php artisan serve

# Access project
http://localhost:8080
```
