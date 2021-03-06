<h2 align="center">Laravel Maintenance Mode</h2>


<p align="center">
<a href="https://packagist.org/packages/mahmud/maintenance-mode"><img src="https://img.shields.io/badge/build-passing-brightgreen.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/mahmud/maintenance-mode"><img src="https://img.shields.io/packagist/v/mahmud/maintenance-mode.svg" alt="Packagist Version"></a>
<a href="https://packagist.org/packages/mahmud/maintenance-mode"><img src="https://img.shields.io/packagist/dt/mahmud/maintenance-mode.svg" alt="Downloads"></a>
<a href="https://packagist.org/packages/mahmud/maintenance-mode"><img src="https://img.shields.io/packagist/l/mahmud/maintenance-mode.svg" alt="License"></a>
</p>

Put your application down and browse in dev mode.

![Screenshot](https://cloud.githubusercontent.com/assets/5725014/26293038/a4619f42-3edc-11e7-9f5c-ef8ad3529184.jpg)

## Installation

1. Install package through composer

```bash
composer require mahmud/maintenance-mode
```

Or add dependency to `composer.json` file

```json
{
    "require": {
        "mahmud/maintenance-mode": "^1.0"
    }
}
```

2. Add Service Provider to `providers` array in `config/app.php`

```php
'providers' =>  [
    \Mahmud\MaintenanceMode\MaintenanceModeServiceProvider::class,
]
```

3. Add the following Middleware in middleware array in app/Http/Kernel.php

```
protected $middleware = [
    \Mahmud\MaintenanceMode\Middleware\MaintenanceModeMiddleware::class,
];
```

4. Publish resources by this command

```bash
php artisan vendor:publish --tag=maintenance-mode --force
```

5. Add `APP_STATUS` and `UP_TIME` to your `.env` file

```bash
APP_STATUS=down
UP_TIME='2017-05-19 23:30:15'
```

## Usage

### .env

Set `APP_STATUS` in your `.env` file. Possible values are `up` and `down`.
Set app status to `down` when you want to go for maintenance. And Also set `UP_TIME` when your application will be up.
`UP_TIME` format is `'YYYY-MM-DD hh:mm:ss'`.

> `UP_TIME` has no effect when `APP_STATUS=up`

### Dev Mode

You can access you app when it is in maintenance mode. To access you must visit your site with query param `mode=dev`
The URL will be 

```
http://your-site.com?mode=dev
```

Once you browse like this you can browse for the next few minutes specified in [cookie_exp_min](https://github.com/mahmudkuet11/laravel-maintenance-mode/tree/dev#cookie_exp_min)

### Configuration

To change configuration go to `config/maintenance-mode.php`. Available configurations are listed below.

#### app_status

This is the status of your app. Possible value are: `down` | `up` . When you start maintenance work, you should set the status to `down`. You can also set the status from .env file. Just set `APP_STATUS=down` in your environment.

#### up_time

You should set time when your application will be up. You can set up time from `.env` file by setting `UP_TIME='YYYY-MM-DD hh:mm:ss'` in this format.

#### cookie_exp_min

Dev mode will be expired after specified minutes. After being expired user should visit the site with mode=dev query param to start dev session again.

#### down_status_code

This status code will be send with the header when you app is down.

#### app_down_msg

This message will be sent as a response when client sent AJAX request to the app. Response will be in JSON format where key is `error` and value is the message. For example:

```php
[
    'error' =>  'Application is down for maintenance'
]
```

#### view

This view is returned when your application is down. You can set a custom view by specifying the view path here. i.e. 

```php
[
    'view'  =>  'public.errors.custom_view'
]
```

when you view path is `resources/views/public/errors.custom_view.blade.php`

