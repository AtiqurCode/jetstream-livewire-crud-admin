<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Clone and App run process

Basic requirements
-  PHP versions 8.1
-  composer
-  MySQL 8.* (any versions)

```
git clone 
composer install 
or
composer install --ignore-platform-reqs
```
Copy the **.env.example** file in ***.env***
or just run this command
```
cp .env.example .env
```
Next update the ***.env*** file

Change these keys in the **.env** file

```
APP_URL=http://127.0.0.1:8000 # change this line app run URL

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_livewire_crud
DB_USERNAME={user_name}
DB_PASSWORD={password}
```

## Code line 

First, install the livewire package
```
composer require livewire/livewire
```

Now run the migrate and app run command via the terminal
```
php artisan migrate
php artisan serve
```

