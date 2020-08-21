# Laravel Extended Resource

This package extends the core `Route::resource()` method in a Laravel project, by adding 3 new routes.

The package adds the following routes to the resource method;


Route | Controller Method | Purpose
----- | ----------------- | -------
GET /deleted | deleted() | Displays all soft deleted models
PATCH /model/{model}/restore | restore(Model $model) | Restore a soft deleted model
GET /model/{model}/delete | delete(Model $model) | Precursor for the destroy route, to confirm deletion of the model

## Support

You are free to use the package on any version of Laravel you like, but at present it has only been tested, and is supported, on Laravel 7.x. 

Testing and support will soon be added for older versions of Laravel.

## Installation

First, install the package via composer.

``` bash
$ composer require lnchuk/laravel-extended-resource
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

``` bash  
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details on contributing to this package.

## Security

If you find any security related issues with this package, please contact security@lnch.co.uk with details of the issue
instead of using the GitHub issues tracker.

## Accreditation

This package is 100% free to use for all projects, both personal and commercial. 

If you do use the package and like what it brings to your project, we'd love to hear
from you. We're 

## Credits

## Licence

The MIT License (MIT). Please see License File for more information.
