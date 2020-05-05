<?php

namespace LNCHUK\LaravelExtendedResource\Helpers;

use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;
use LNCHUK\LaravelExtendedResource\Commands\ExtendedControllerMakeCommand;
use LNCHUK\LaravelExtendedResource\ExtendedResourceRegistrar;

class ExtendedResource
{
    public static function init()
    {
        app()->bind(ResourceRegistrar::class, function () {
            return new ExtendedResourceRegistrar(app()->make(Router::class));
        });

        app()->extend('command.make.controller', function () {
            return new ExtendedControllerMakeCommand;
        });
    }
}
