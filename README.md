# Laravel Extended Resource

This package extends the core `Route::resource()` method in a Laravel project, by adding 3 new routes.

The package adds the following routes to the resource method;


Route | Controller Method | Purpose
----- | ----------------- | -------
GET /trashed | trashed() | Displays all soft deleted models
POST /model/{model}/restore | restore(Model $model) | Restore a soft deleted model
GET /model/{model}/delete | delete(Model $model) | Precursor for the destroy route, to confirm deletion of the model

## Support

You are free to use the package on any version of Laravel you like, but at present it has only been tested, and is supported, on Laravel 7.x. 

Testing and support will soon be added for older versions of Laravel.

## Installation

First, install the package via composer.

```
composer require lnchuk/laravel-extended-resource
```

## Usage

Once the package is installed, add the following line to your AppServiceProvider's boot method.

```
use LNCHUK\LaravelExtendedResource\Helpers\ExtendedResource;

...
public function boot() {
    ExtendedResource::init();
}
...
```

From here the package is ready to use. All calls to the core `Route::resource()` method will automatically generate the extra routes listed above.

To generate extended resource controllers from the command line, you can use the newly added -e option to the `make:controller` command.

```
php artisan make:controller -e UsersController
```

## Changelog

Please view the [CHANGELOG](CHANGELOG.md) for details of what has been changed between versions.

## Testing

To run the included tests, a composer script is added to run the PHPUnit tests.

```composer test```

## Contributing

## Security

## Accreditation

## Credits

## Licence

