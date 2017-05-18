## Installation

1. Install package through composer

```bash
composer require mahmud/maintenance-mode
```

Or add dependency to `composer.json` file

```json
{
    "require": {
        "mahmud/maintenance-mode": "~1.0"
    }
}
```

2. Add Service Provider to `providers` array in `config/app.php`

```php
'providers' =>  [
    \Mahmud\MaintenanceMode\MaintenanceModeServiceProvider::class,
]
```

3. Publish resources by this command

```bash
php artisan vendor:publish --tag=maintenance-mode --force
```

4. Add `APP_STATUS` and `UP_TIME` to your `.env` file

```
APP_STATUS=down
UP_TIME='2017-05-19 23:30:15'
```

